<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Resources | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Resources</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Resources</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="highlights-grid">
            <article class="highlight-card" id="verify">
                <i class="fas fa-certificate"></i>
                <h3>Verify Certificates</h3>
                <p>Enter your certificate ID to verify authenticity of <?= e(SITE_NAME) ?> training certificates.</p>
                <form class="contact-form" style="margin-top:1rem" onsubmit="alert('Certificate verification will be enabled soon.');return false;">
                    <input type="text" placeholder="Certificate ID" required>
                    <button type="submit" class="btn btn-teal btn-block">Verify</button>
                </form>
            </article>
            <article class="highlight-card" id="payment">
                <i class="fas fa-credit-card"></i>
                <h3>Make Payment</h3>
                <p>Secure online payment for courses and training programs. Contact us for payment links.</p>
                <a href="contact.php" class="btn btn-teal" style="margin-top:1rem">Contact for Payment</a>
            </article>
            <article class="highlight-card" id="career">
                <i class="fas fa-briefcase"></i>
                <h3>Career</h3>
                <p>Join our team of trainers, developers and placement consultants. Email <?= e(SITE_EMAIL_CAREERS) ?>.</p>
                <a href="careers.php" class="btn btn-outline" style="margin-top:1rem">View Open Roles</a>
            </article>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
