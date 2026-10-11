<?php
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? SITE_NAME . ' - Modern IT services, cloud modernization, custom software, and managed support.';
$root = $root ?? '';
$homeUrl = $root . 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="icon" href="<?= e($root . $logoIcon) ?>" type="image/jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php if (!empty($isHomepage)): ?>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php else: ?>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= e($root) ?>assets/css/style.css">
    <?php if (!empty($isHomepage)): ?>
    <link rel="stylesheet" href="<?= e($root) ?>assets/css/home.css">
    <?php else: ?>
    <link rel="stylesheet" href="<?= e($root) ?>assets/css/interior.css">
    <?php endif; ?>
</head>
<body>
<?php if (!empty($isHomepage)): ?>
    <div class="jh-site" id="jmmgHome" data-theme="light" data-home-view="finder">
        <header class="jh-header" id="siteHeader">
            <div class="jh-header-inner">
                <a class="jh-brand" href="<?= e($homeUrl) ?>" aria-label="JMMG INFORTECH home">
                    <img src="<?= e($root . $logoFull) ?>" alt="JMMG INFORTECH logo">
                    <span class="jh-brand-copy">JMMG <span>INFORTECH</span></span>
                </a>
                <nav class="jh-desktop-nav" aria-label="Main navigation">
                    <a href="<?= e($root) ?>pages/services.php">IT Services</a>
                    <a href="<?= e($root) ?>pages/about.php">About</a>
                    <a href="<?= e($root) ?>pages/contact.php">Contact</a>
                </nav>
                <details class="jh-mobile-menu">
                    <summary>Menu <i class="fas fa-bars" aria-hidden="true"></i></summary>
                    <nav class="jh-mobile-popover" aria-label="Mobile navigation">
                        <p>Business</p>
                        <a href="<?= e($root) ?>pages/services.php">IT Services</a>
                        <a href="<?= e($root) ?>pages/about.php">About JMMG</a>
                        <a href="<?= e($root) ?>pages/contact.php">Contact</a>
                    </nav>
                </details>
                <div class="jh-header-actions">
                    <div class="jh-header-controls">
                        <div class="jh-view-control">
                            <span class="jh-control-label" id="jh-home-view-label">Homepage view</span>
                            <div class="jh-view-tabs" role="tablist" aria-labelledby="jh-home-view-label">
                                <button class="jh-view-tab" id="jh-tab-finder" type="button" role="tab" aria-selected="true" aria-controls="jh-panel-finder" tabindex="0" data-home-view-tab="finder">Find a service</button>
                                <button class="jh-view-tab" id="jh-tab-explore" type="button" role="tab" aria-selected="false" aria-controls="jh-panel-explore" tabindex="-1" data-home-view-tab="explore">Explore JMMG</button>
                            </div>
                        </div>
                        <button class="jh-theme-toggle" id="jh-theme-toggle" type="button" aria-label="Switch to dark mode" aria-pressed="false">
                            <i class="fas fa-moon" id="jh-theme-icon" aria-hidden="true"></i>
                            <span id="jh-theme-label">Dark mode</span>
                        </button>
                    </div>
                    <a class="jh-header-cta" href="#enquire" data-open-enquire>Discuss a project <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </header>
        <main class="jh-main" id="main-content">
<?php else: ?>
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="top-bar-left">
                <i class="fas fa-location-dot" aria-hidden="true"></i> <?= e(SITE_ADDRESS) ?>
            </div>
            <div class="top-bar-right"><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></div>
        </div>
    </div>

    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a href="<?= e($homeUrl) ?>" class="logo">
                <img src="<?= e($root . $logoFull) ?>" alt="<?= e(SITE_NAME) ?>">
            </a>
            <div class="nav-backdrop" id="navBackdrop" aria-hidden="true"></div>
            <nav class="main-nav" id="mainNav" aria-label="Main navigation">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?= e($homeUrl) ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= e($root) ?>pages/about.php">About Us</a>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="<?= e($root) ?>pages/services.php#it-services">IT Services <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown dropdown-scroll">
                            <?php foreach ($itServicesNav as $item): ?>
                            <li><a<?= navEnquiryTopic($item) ?>><?= e($item) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= e($root) ?>pages/contact.php">Contact</a>
                    </li>
                </ul>
                <a href="#enquire" class="btn btn-teal nav-cta" data-open-enquire>Enquire Now</a>
            </nav>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>
    <main class="site-main">
<?php endif; ?>
