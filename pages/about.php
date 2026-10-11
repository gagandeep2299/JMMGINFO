<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'About Us | ' . SITE_NAME;
$serviceGroups = [
    'Build' => ['ai-product-engineering', 'custom-software'],
    'Modernize' => ['cloud-modernization', 'microservices'],
    'Operate' => ['ticketing-tools', 'managed-it-support'],
];
$servicesById = [];
foreach ($services as $service) {
    $servicesById[$service['id']] = $service;
}
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="ji-page">
    <section class="ji-hero">
        <div class="ji-wrap ji-hero-inner">
            <span class="ji-eyebrow">About JMMG INFORTECH</span>
            <h1>IT services, shaped around business work.</h1>
            <p>We build, modernize and operate software systems around the teams, workflows and goals of growing organizations.</p>
            <p class="ji-breadcrumb"><a href="../index.php">Home</a> / About</p>
        </div>
    </div>

    <section class="ji-section">
        <div class="ji-wrap">
            <div class="ji-section-head">
                <div><span class="ji-eyebrow">What we take on</span><h2>The work JMMG takes on</h2></div>
                <p>From an early product idea to dependable day-to-day operations, our teams work across the full technology lifecycle.</p>
            </div>
            <div class="ji-grid-3">
                <?php foreach ($serviceGroups as $group => $serviceIds): ?>
                <article class="ji-card">
                    <span class="ji-eyebrow"><?= e($group) ?></span>
                    <ul class="ji-list">
                        <?php foreach ($serviceIds as $serviceId): ?>
                            <?php if (!isset($servicesById[$serviceId])) continue; ?>
                            <?php $service = $servicesById[$serviceId]; ?>
                            <li><i class="fas fa-arrow-right" aria-hidden="true"></i><a href="services.php#<?= e($service['id']) ?>"><?= e($service['title']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="ji-section ji-section-soft" id="vision">
        <div class="ji-wrap ji-feature-band">
            <div><span class="ji-eyebrow">Our vision</span><h2>The bridge between potential and professionalism.</h2></div>
            <div class="ji-feature-copy">
                <h2>Secure, reliable and future-ready.</h2>
                <p>Our mission is to help businesses scale through technology built around productivity, automation and practical innovation.</p>
                <p><?= e(SITE_NAME) ?> designs AI-powered products, custom software, cloud modernization and managed support for real operating needs.</p>
            </div>
        </div>
    </section>

    <section class="ji-section" id="branches">
        <div class="ji-wrap">
            <div class="ji-section-head">
                <div><span class="ji-eyebrow">Where we work</span><h2>Four locations. Clear roles.</h2></div>
            </div>
            <div class="ji-grid-4">
                <article class="ji-card ji-place-card"><strong>Noida</strong><span>Head Office</span></article>
                <article class="ji-card ji-place-card"><strong>Delhi NCR</strong><span>JMMG location</span></article>
                <article class="ji-card ji-place-card"><strong>Lucknow</strong><span>Regional Office</span></article>
                <article class="ji-card ji-place-card"><strong>Dehradun</strong><span>JMMG location</span></article>
            </div>
        </div>
    </section>

    <section class="ji-section ji-section-soft">
        <div class="ji-wrap ji-section-head">
            <div><span class="ji-eyebrow">Start a conversation</span><h2>Talk with JMMG about your IT requirements.</h2></div>
            <a class="ji-button" href="contact.php">Contact our team <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </section>
</div>
<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
