<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'IT Services | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="ji-page">
    <section class="ji-hero">
        <div class="ji-wrap ji-hero-inner">
            <span class="ji-eyebrow">JMMG IT Services</span>
            <h1>IT services for software, cloud and operations.</h1>
            <p>Choose the work you need to move forward. Each service is shaped around your systems, people and goals.</p>
            <p class="ji-breadcrumb"><a href="../index.php">Home</a> / IT Services</p>
        </div>
    </section>

    <section class="ji-section" id="it-services">
        <div class="ji-wrap">
            <div class="ji-section-head">
                <div><span class="ji-eyebrow">How we can help</span><h2>Choose the work you need to move forward.</h2></div>
                <p>From product engineering to managed support, get a focused team for the next step in your technology roadmap.</p>
            </div>
            <div class="ji-grid-3">
                <?php foreach ($services as $svc): ?>
                <article class="ji-card ji-service-card" id="<?= e($svc['id']) ?>">
                    <span class="ji-card-icon"><i class="fas <?= e($svc['icon']) ?>" aria-hidden="true"></i></span>
                    <h2><?= e($svc['title']) ?></h2>
                    <p><?= e($svc['desc']) ?></p>
                    <a href="contact.php" class="ji-card-link">Discuss this service <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="ji-section ji-section-soft">
        <div class="ji-wrap">
            <div class="ji-section-head">
                <div><span class="ji-eyebrow">Start a conversation</span><h2>Discuss your IT requirements.</h2></div>
                <a class="ji-button" href="contact.php">Contact our team <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
</div>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
