<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Mock Interview | ' . SITE_NAME;

$accessKey = trim($_GET['key'] ?? '');
$granted = $accessKey !== '' && hash_equals(MOCK_INTERVIEW_KEY, $accessKey);

if ($granted && MOCK_INTERVIEW_FORM_URL !== '' && empty($_GET['stay'])) {
    header('Location: ' . MOCK_INTERVIEW_FORM_URL);
    exit;
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Mock Interview Assessment</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Mock Interview</p>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:640px">
        <?php if (!$granted): ?>
        <div class="highlight-card">
            <h2>Access Required</h2>
            <p>This assessment is available only during campus mock interview sessions. Please use the link shared by your <?= e(SITE_NAME) ?> coordinator.</p>
        </div>
        <?php elseif (MOCK_INTERVIEW_FORM_URL === ''): ?>
        <div class="highlight-card">
            <h2>Assessment Link Not Configured</h2>
            <p>Add your Google Form URL to <code>MOCK_INTERVIEW_FORM_URL</code> in <code>includes/config.php</code>, then share this page with your access key:</p>
            <p><strong>pages/mock-interview.php?key=<?= e(MOCK_INTERVIEW_KEY) ?></strong></p>
        </div>
        <?php else: ?>
        <div class="highlight-card">
            <h2>Start Your Mock Interview</h2>
            <p>Click below to open the assessment form. This link is intended for on-campus sessions only.</p>
            <a href="<?= e(MOCK_INTERVIEW_FORM_URL) ?>" class="btn btn-teal" target="_blank" rel="noopener" style="margin-top:1rem">Start Test</a>
            <p style="margin-top:1rem;font-size:0.9rem;opacity:0.85">Share only with students during the session: <code>mock-interview.php?key=<?= e(MOCK_INTERVIEW_KEY) ?></code></p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
