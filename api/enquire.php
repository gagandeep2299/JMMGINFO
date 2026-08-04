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
$course = trim($_POST['course'] ?? '');
$message = trim($_POST['message'] ?? '');

$redirect = $_SERVER['HTTP_REFERER'] ?? '../index.php';
$separator = str_contains($redirect, '?') ? '&' : '?';

if ($name === '' || $email === '' || $phone === '' || $course === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    'course' => $course,
    'message' => $message,
    'submitted_at' => date('c'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

file_put_contents(
    $dataDir . '/enquiries.jsonl',
    json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

if (!sendEnquiryEmail($name, $email, $phone, $course, $message)) {
    header('Location: ' . $redirect . $separator . 'enquiry=error');
    exit;
}

header('Location: ' . $redirect . $separator . 'enquiry=success');
exit;
