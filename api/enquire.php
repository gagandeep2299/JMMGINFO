<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/mail.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$service = trim($_POST['service'] ?? '');
$message = trim($_POST['message'] ?? '');

$redirect = $_SERVER['HTTP_REFERER'] ?? '../index.php';
$separator = str_contains($redirect, '?') ? '&' : '?';

$serviceTitles = array_column($services, 'title');
if ($name === '' || $email === '' || $phone === '' || !in_array($service, $serviceTitles, true) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . $redirect . $separator . 'enquiry=error');
    exit;
}

$dataDir = dirname(__DIR__) . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$entry = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'service' => $service,
    'message' => $message,
    'submitted_at' => date('c'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

file_put_contents(
    $dataDir . '/enquiries.jsonl',
    json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

if (!sendEnquiryEmail($name, $email, $phone, $service, $message)) {
    header('Location: ' . $redirect . $separator . 'enquiry=error');
    exit;
}

header('Location: ' . $redirect . $separator . 'enquiry=success');
exit;
