<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'About Us | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>About <?= e(SITE_NAME) ?></h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / About</p>
    </div>
</section>

<section class="section">
    <div class="container two-col">
        <div>
            <h2>Together, We Build Stronger Organizations</h2>
            <p><?= e(SITE_NAME) ?> is a training, internship, placement, payroll, compliance, HR, and IT services company empowering students and businesses across India. We partner with prestigious institutions and corporates to deliver future-ready, AI-driven skills.</p>
            <p>From campus training and industrial programs (45 days to 6 months) to payroll & compliance, HR services, recruitment, and custom software development — we provide end-to-end solutions under one roof. <?= e($audienceText) ?></p>
        </div>
        <div class="img-card">
            <img src="<?= e($root . ASSETS_URL . '/' . $imgAboutTeam) ?>" alt="About <?= e(SITE_NAME) ?>">
        </div>
    </div>
</section>

<section class="section section-alt" id="vision">
    <div class="container">
        <h2 class="section-title center">Vision & Mission</h2>
        <div class="two-col">
            <div class="highlight-card">
                <h3>Our Vision</h3>
                <p>The Bridge Between Potential and Professionalism</p>
            </div>
            <div class="highlight-card">
                <h3>Our Mission</h3>
                <p>To empower individuals and organizations through quality education, reliable HR and payroll services, and innovative AI-based IT solutions.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="branches">
    <div class="container">
        <h2 class="section-title center">Our Branches</h2>
        <div class="highlights-grid">
            <article class="highlight-card"><h3>Noida</h3><p>Head Office</p></article>
            <article class="highlight-card"><h3>Delhi NCR</h3><p>Training Center</p></article>
            <article class="highlight-card"><h3>Lucknow</h3><p>Regional Office</p></article>
            <article class="highlight-card"><h3>Dehradun</h3><p>Training Center</p></article>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
