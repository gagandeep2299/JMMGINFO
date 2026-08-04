<?php
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? SITE_NAME . ' - IT Services, Payroll & Compliance, HR Services, Training & Internship.';
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= e($root) ?>assets/css/style.css">
</head>
<body>
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="top-bar-left">
                <a href="mailto:<?= e(SITE_EMAIL) ?>"><i class="fas fa-envelope"></i> <?= e(SITE_EMAIL) ?></a>
                <span class="divider">|</span>
                <a href="mailto:<?= e(SITE_EMAIL_CAREERS) ?>"><i class="fas fa-briefcase"></i> <?= e(SITE_EMAIL_CAREERS) ?></a>
            </div>
            <div class="top-bar-right">
                <span class="badge-new">New</span>
                <a href="<?= e($root) ?>pages/services.php#it-development">AI Based IT Product and Services</a>
                <a href="#enquire" class="btn btn-sm btn-teal" data-open-enquire>Enquire Now</a>
                <a href="#enquire" class="btn btn-sm btn-outline-light" data-open-enquire>Registration</a>
            </div>
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
                    <li class="nav-item">
                        <a href="<?= e($root) ?>pages/services.php#hr-services">HR Services</a>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="<?= e($root) ?>pages/services.php#it-development">IT Services <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown dropdown-scroll">
                            <?php foreach ($itServicesNav as $item): ?>
                            <li><a<?= navEnquiryTopic($item) ?>><?= e($item) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown">
                        <a href="<?= e($root) ?>pages/courses.php">Training Program <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown dropdown-scroll">
                            <?php foreach ($trainingPrograms as $program): ?>
                            <li>
                                <?php if ($program['type'] === 'enquire'): ?>
                                <a<?= navEnquiryTopic($program['label']) ?>><?= e($program['label']) ?></a>
                                <?php else: ?>
                                <a href="<?= e(trainingProgramItemUrl($root, $program)) ?>"><?= e($program['label']) ?></a>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= e($root) ?>pages/careers.php">Careers</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= e($root) ?>pages/contact.php">Contact Us</a>
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
