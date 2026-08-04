<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Placement | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Placement Cell</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Placement</p>
    </div>
</section>

<section class="section">
    <div class="container two-col">
        <div>
            <h2>100% Placement Record</h2>
            <p><?= e(SITE_NAME) ?> provides dedicated placement support with AI-driven, industry-aligned training, mock interviews, resume building and connections to top MNCs.</p>
            <ul class="check-list">
                <li>Dedicated placement team</li>
                <li>Hot jobs and placement drives</li>
                <li>Real-time project experience</li>
                <li>Interview preparation sessions</li>
            </ul>
            <a href="#enquire" class="btn btn-teal" data-open-enquire style="margin-top:1rem">Apply for Placement</a>
        </div>
        <div class="img-card">
            <img src="<?= e($root . ASSETS_URL . '/' . $imgHeroPlacement) ?>" alt="Placement">
        </div>
    </div>
</section>

<section class="section section-alt" id="testimonials">
    <div class="container">
        <h2 class="section-title center">Placement Testimonials</h2>
        <div class="testimonial-slider" id="placementTestimonialSlider">
            <div class="testimonial-track">
                <?php foreach ($testimonials as $t): ?>
                <blockquote class="testimonial-card">
                    <p>"<?= e($t['text']) ?>"</p>
                    <footer><strong><?= e($t['name']) ?></strong><span><?= e($t['course']) ?></span></footer>
                </blockquote>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section" id="gallery">
    <div class="container">
        <h2 class="section-title center">HR Events & Gallery</h2>
        <div class="course-grid">
            <?php foreach ($hrGallery as $img): ?>
            <div class="img-card"><img src="<?= e($root . ASSETS_URL . '/' . $img) ?>" alt="HR event gallery"></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
