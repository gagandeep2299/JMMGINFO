<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Services | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Our Services</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Services</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php foreach ($services as $svc):
            $img = $serviceImages[$svc['id']] ?? $serviceImages['default'];
        ?>
        <article class="service-detail" id="<?= e($svc['id']) ?>">
            <img src="<?= e($root . ASSETS_URL . '/' . $img) ?>" alt="<?= e($svc['title']) ?>">
            <div>
                <h2><i class="fas <?= e($svc['icon']) ?>"></i> <?= e($svc['title']) ?></h2>
                <p><?= e($svc['desc']) ?></p>
                <p><?= e(SITE_NAME) ?> delivers <?= e(strtolower($svc['title'])) ?> using AI methodology and techniques, with experienced trainers and dedicated support for students and corporates.</p>
                <div class="service-actions" style="justify-content:flex-start;margin-top:1rem">
                    <a href="#enquire" class="btn btn-teal" data-open-enquire>Enquiry Now</a>
                </div>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
