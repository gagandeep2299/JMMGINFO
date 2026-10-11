<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = SITE_NAME . ' | Software, Cloud, AI & IT Services';
$pageDescription = 'JMMG INFORTECH designs AI products and custom software, modernizes cloud systems, and supports day-to-day IT operations.';
$root = '';
$isHomepage = true;

$serviceGroups = [
    'Build' => ['ai-product-engineering', 'custom-software'],
    'Modernize' => ['cloud-modernization', 'microservices'],
    'Operate' => ['ticketing-tools', 'managed-it-support'],
];
$servicesById = [];
foreach ($services as $service) {
    $servicesById[$service['id']] = $service;
}

require_once __DIR__ . '/includes/header.php';
$enquiryStatus = $_GET['enquiry'] ?? '';
?>

<?php if ($enquiryStatus === 'success'): ?>
    <div class="jh-message jh-message-success" role="status">Thank you! Your enquiry has been submitted successfully.</div>
<?php elseif ($enquiryStatus === 'error'): ?>
    <div class="jh-message jh-message-error" role="alert">Please fill all required fields.</div>
<?php endif; ?>

<section class="jh-panel jh-finder" id="jh-panel-finder" role="tabpanel" aria-labelledby="jh-tab-finder" tabindex="0">
    <div class="jh-finder-hero jh-wrap">
        <div class="jh-finder-intro">
            <h1 class="jh-display" id="jh-finder-heading">Custom software for the way your business works.</h1>
            <p>JMMG INFORTECH designs AI products, custom software, cloud platforms and IT support around your teams and workflows.</p>
            <div class="jh-actions">
                <a class="jh-button jh-button-blue" href="#jh-service-selector">Choose a service <i class="fas fa-arrow-down" aria-hidden="true"></i></a>
                <a class="jh-text-link" href="pages/services.php">See all IT services <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <section class="jh-service-card" id="jh-service-selector" aria-labelledby="jh-service-selector-title">
            <header class="jh-service-card-heading">
                <h2 class="jh-display" id="jh-service-selector-title">What do you need help with?</h2>
                <p>Choose a service to see where JMMG can help.</p>
            </header>
            <div class="jh-service-workspace">
                <div class="jh-service-tabs" role="tablist" aria-label="Select an IT service" aria-orientation="vertical">
                    <?php foreach ($services as $index => $service): ?>
                        <button
                            class="jh-home-service-tab"
                            id="jh-service-tab-<?= e($service['id']) ?>"
                            type="button"
                            role="tab"
                            aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
                            aria-controls="jh-service-detail"
                            tabindex="<?= $index === 0 ? '0' : '-1' ?>"
                            data-service-id="<?= e($service['id']) ?>"
                            data-service-title="<?= e($service['title']) ?>"
                            data-service-description="<?= e($service['desc']) ?>"
                        >
                            <span><?= e($service['title']) ?></span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    <?php endforeach; ?>
                </div>
                <?php $initialService = $services[0]; ?>
                <div class="jh-service-detail" id="jh-service-detail" role="tabpanel" aria-labelledby="jh-service-tab-<?= e($initialService['id']) ?>" tabindex="0">
                    <div>
                        <span class="jh-selected-label">Selected service</span>
                        <h3 class="jh-display" id="jh-selected-service-title"><?= e($initialService['title']) ?></h3>
                        <p id="jh-selected-service-description"><?= e($initialService['desc']) ?></p>
                    </div>
                    <div class="jh-detail-actions">
                        <a class="jh-button jh-button-lime" id="jh-service-enquiry" href="#enquire" data-open-enquire data-enquiry-topic="<?= e($initialService['title']) ?>">
                            <span>Enquire about <?= e($initialService['title']) ?></span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                        <a class="jh-detail-link" id="jh-service-details" href="pages/services.php#<?= e($initialService['id']) ?>">Read service details</a>
                    </div>
                </div>
            </div>
            <footer class="jh-service-card-footer">
                <span>All six services are listed here.</span>
                <a href="pages/services.php">Browse service details <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </footer>
        </section>
    </div>
</section>

<section class="jh-panel jh-explore" id="jh-panel-explore" role="tabpanel" aria-labelledby="jh-tab-explore" tabindex="0" hidden>
    <section class="jh-business-hero" aria-labelledby="jh-business-heading">
        <div class="jh-business-layout jh-wrap">
            <div class="jh-business-copy">
                <h1 class="jh-display" id="jh-business-heading">Software, cloud and AI systems for business.</h1>
                <p>JMMG INFORTECH designs AI products and custom software, modernizes cloud systems, and supports day-to-day IT operations.</p>
                <div class="jh-actions">
                    <a class="jh-button jh-button-blue" href="pages/contact.php">Discuss an IT project <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    <a class="jh-business-link" href="pages/services.php">See all IT services</a>
                </div>
                <p class="jh-location">Based in <?= e(SITE_ADDRESS) ?></p>
            </div>
            <div class="jh-service-map" aria-label="IT services organized by business need">
                <?php foreach ($serviceGroups as $group => $serviceIds): ?>
                    <section class="jh-service-map-row" aria-labelledby="jh-group-<?= e(strtolower($group)) ?>">
                        <h2 class="jh-display" id="jh-group-<?= e(strtolower($group)) ?>"><?= e($group) ?></h2>
                        <div class="jh-service-map-links">
                            <?php foreach ($serviceIds as $serviceId): ?>
                                <?php if (!isset($servicesById[$serviceId])) continue; ?>
                                <?php $service = $servicesById[$serviceId]; ?>
                                <a href="pages/services.php#<?= e($service['id']) ?>">
                                    <span><?= e($service['title']) ?></span>
                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="jh-contact-ribbon" aria-label="Company contact details">
        <div class="jh-contact-ribbon-inner jh-wrap">
            <strong>A technology partner for business teams</strong>
            <div class="jh-contact-links">
                <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
                <a href="mailto:<?= e(SITE_EMAIL_SALES) ?>"><?= e(SITE_EMAIL_SALES) ?></a>
            </div>
        </div>
    </section>

</section>

<script src="assets/js/home.js" defer></script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>