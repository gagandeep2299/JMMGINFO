<?php
declare(strict_types=1);

require_once __DIR__ . '/mail.config.php';

$mailLocal = __DIR__ . '/mail.local.php';
if (is_file($mailLocal)) {
    require_once $mailLocal;
}

require_once __DIR__ . '/smtp.php';

function sendEnquiryEmail(string $name, string $email, string $phone, string $course, string $message): bool
{
    $to = SITE_EMAIL;
    $subject = 'New Website Enquiry: ' . $course . ' | ' . SITE_NAME;

    $bodyLines = [
        'A new enquiry was submitted on the ' . SITE_NAME . ' website.',
        '',
        'Name: ' . $name,
        'Email: ' . $email,
        'Phone: ' . $phone,
        'Course / Service: ' . $course,
        'Message: ' . ($message !== '' ? $message : '(not provided)'),
        '',
        'Submitted at: ' . date('Y-m-d H:i:s'),
        'IP address: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'),
    ];

    $body = implode("\r\n", $bodyLines);
    $fromName = SITE_NAME . ' Website';

    return sendSiteEmail($to, $subject, $body, SITE_EMAIL, $fromName, $email, $name);
}

function sendSiteEmail(
    string $to,
    string $subject,
    string $body,
    string $fromEmail,
    string $fromName,
    string $replyToEmail,
    string $replyToName
): bool {
    $driver = resolveMailDriver();

    if ($driver === 'smtp') {
        return smtpSend(
            SMTP_HOST,
            (int) SMTP_PORT,
            SMTP_ENCRYPTION,
            SMTP_USER,
            SMTP_PASS,
            $fromEmail,
            $fromName,
            $to,
            $replyToEmail,
            $replyToName,
            $subject,
            $body
        );
    }

    if ($driver === 'file') {
        return saveEmailToOutbox($to, $subject, $body, $fromEmail, $fromName, $replyToEmail, $replyToName);
    }

    $headers = implode("\r\n", [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $fromName . ' <' . $fromEmail . '>',
        'Reply-To: ' . $replyToName . ' <' . $replyToEmail . '>',
    ]);

    return @mail($to, $subject, $body, $headers);
}

function resolveMailDriver(): string
{
    $driver = defined('MAIL_DRIVER') ? MAIL_DRIVER : 'auto';

    if ($driver !== 'auto') {
        return $driver;
    }

    if (smtpIsConfigured()) {
        return 'smtp';
    }

    if (isLocalDevEnvironment()) {
        return 'file';
    }

    return 'mail';
}

function smtpIsConfigured(): bool
{
    return SMTP_HOST !== '' && SMTP_USER !== '' && SMTP_PASS !== '';
}

function isLocalDevEnvironment(): bool
{
    $host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? ''));

    return $host === ''
        || preg_match('/^(localhost|127\.0\.0\.1|\[::1\])(:\d+)?$/', $host) === 1;
}

function saveEmailToOutbox(
    string $to,
    string $subject,
    string $body,
    string $fromEmail,
    string $fromName,
    string $replyToEmail,
    string $replyToName
): bool {
    $outboxDir = dirname(__DIR__) . '/data/outbox';

    if (!is_dir($outboxDir) && !mkdir($outboxDir, 0755, true) && !is_dir($outboxDir)) {
        return false;
    }

    $filename = sprintf(
        'enquiry-%s-%s.eml',
        date('Ymd-His'),
        bin2hex(random_bytes(4))
    );

    $content = implode("\r\n", [
        'To: ' . $to,
        'Subject: ' . $subject,
        'From: ' . $fromName . ' <' . $fromEmail . '>',
        'Reply-To: ' . $replyToName . ' <' . $replyToEmail . '>',
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        '',
        $body,
    ]);

    return file_put_contents($outboxDir . '/' . $filename, $content . "\r\n") !== false;
}
