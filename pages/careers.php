<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Careers | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Careers</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Careers</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="section-sub" style="margin-bottom:2rem">Join <?= e(SITE_NAME) ?>. Explore open roles below and apply directly using the apply link for each position.</p>
        <div class="careers-grid">
            <?php foreach ($careerJobs as $job): ?>
            <article class="career-card">
                <h3><?= e($job['title']) ?></h3>
                <p><i class="fas fa-map-marker-alt"></i> <?= e($job['location']) ?></p>
                <p><i class="fas fa-clock"></i> <?= e($job['type']) ?></p>
                <a href="<?= e($job['apply_url']) ?>" class="btn btn-teal" target="_blank" rel="noopener">Apply Now</a>
            </article>
            <?php endforeach; ?>
        </div>
        <p style="margin-top:2rem;text-align:center">Don't see a matching role? Email us at <a href="mailto:<?= e(SITE_EMAIL_CAREERS) ?>"><?= e(SITE_EMAIL_CAREERS) ?></a></p>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
