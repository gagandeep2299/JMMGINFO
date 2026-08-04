<?php
declare(strict_types=1);

function smtpSend(
    string $host,
    int $port,
    string $encryption,
    string $username,
    string $password,
    string $fromEmail,
    string $fromName,
    string $toEmail,
    string $replyToEmail,
    string $replyToName,
    string $subject,
    string $body
): bool {
    $remote = $encryption === 'ssl'
        ? 'ssl://' . $host . ':' . $port
        : $host . ':' . $port;

    $socket = @stream_socket_client(
        $remote,
        $errno,
        $errstr,
        15,
        STREAM_CLIENT_CONNECT
    );

    if ($socket === false) {
        return false;
    }

    stream_set_timeout($socket, 15);

    if (!smtpExpect($socket, [220]) || !smtpCommand($socket, 'EHLO ' . smtpClientName(), [250])) {
        fclose($socket);
        return false;
    }

    if ($encryption === 'tls') {
        if (!smtpCommand($socket, 'STARTTLS', [220])) {
            fclose($socket);
            return false;
        }

        $cryptoOk = @stream_socket_enable_crypto(
            $socket,
            true,
            STREAM_CRYPTO_METHOD_TLS_CLIENT
        );

        if ($cryptoOk !== true || !smtpCommand($socket, 'EHLO ' . smtpClientName(), [250])) {
            fclose($socket);
            return false;
        }
    }

    if ($username !== '' && $password !== '') {
        if (!smtpCommand($socket, 'AUTH LOGIN', [334])
            || !smtpCommand($socket, base64_encode($username), [334])
            || !smtpCommand($socket, base64_encode($password), [235])) {
            fclose($socket);
            return false;
        }
    }

    $fromHeader = smtpEncodeAddress($fromName, $fromEmail);
    $replyHeader = smtpEncodeAddress($replyToName, $replyToEmail);

    $message = implode("\r\n", [
        'Date: ' . date('r'),
        'From: ' . $fromHeader,
        'Reply-To: ' . $replyHeader,
        'To: ' . $toEmail,
        'Subject: ' . smtpEncodeHeader($subject),
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
        '',
        $body,
    ]);

    $ok = smtpCommand($socket, 'MAIL FROM:<' . $fromEmail . '>', [250])
        && smtpCommand($socket, 'RCPT TO:<' . $toEmail . '>', [250, 251])
        && smtpCommand($socket, 'DATA', [354])
        && smtpWrite($socket, smtpDotStuff($message) . "\r\n.")
        && smtpExpect($socket, [250]);

    smtpCommand($socket, 'QUIT', [221]);
    fclose($socket);

    return $ok;
}

function smtpClientName(): string
{
    $host = $_SERVER['SERVER_NAME'] ?? 'localhost';
    return preg_replace('/[^a-zA-Z0-9.-]/', '', $host) ?: 'localhost';
}

function smtpCommand($socket, string $command, array $okCodes): bool
{
    if (!smtpWrite($socket, $command)) {
        return false;
    }

    return smtpExpect($socket, $okCodes);
}

function smtpWrite($socket, string $data): bool
{
    return fwrite($socket, $data . "\r\n") !== false;
}

function smtpExpect($socket, array $okCodes): bool
{
    $response = '';

    while (($line = fgets($socket, 515)) !== false) {
        $response .= $line;
        if (isset($line[3]) && $line[3] === ' ') {
            break;
        }
    }

    if ($response === '') {
        return false;
    }

    $code = (int) substr($response, 0, 3);

    return in_array($code, $okCodes, true);
}

function smtpDotStuff(string $message): string
{
    return preg_replace('/^\./m', '..', $message) ?? $message;
}

function smtpEncodeAddress(string $name, string $email): string
{
    $safeName = smtpEncodeHeader($name);
    return $safeName . ' <' . $email . '>';
}

function smtpEncodeHeader(string $value): string
{
    if ($value === '' || preg_match('/^[\x20-\x7E]*$/', $value)) {
        return $value;
    }

    return '=?UTF-8?B?' . base64_encode($value) . '?=';
}
