<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$selected = trim($_GET['course'] ?? '');
$selectedName = '';

if ($selected !== '') {
    foreach ($popularCourses as $course) {
        if ($course['slug'] === $selected) {
            $selectedName = $course['name'];
            break;
        }
    }
    if ($selectedName === '') {
        foreach ($trainingPrograms as $program) {
            if (($program['slug'] ?? '') === $selected) {
                $selectedName = $program['label'];
                break;
            }
        }
    }
    if ($selectedName === '') {
        foreach ($courseMenu as $items) {
            foreach ($items as $item) {
                if (courseSlug($item) === $selected) {
                    $selectedName = $item;
                    break 2;
                }
            }
        }
    }
    if ($selectedName === '') {
        $selectedName = str_replace('-', ' ', ucwords($selected, '-'));
    }
}

$pageTitle = $selectedName ? $selectedName . ' | ' . SITE_NAME : 'Courses | ' . SITE_NAME;
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php if ($selectedName): ?>
        <h1><?= e($selectedName) ?></h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / <a href="courses.php">Training Program</a> / <?= e($selectedName) ?></p>
        <?php else: ?>
        <h1>Our Courses</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Courses</p>
        <?php endif; ?>
    </div>
</section>

<?php if ($selectedName): ?>
<section class="section section-alt">
    <div class="container two-col">
        <div>
            <h2><?= e($selectedName) ?> Training Program</h2>
            <p>Industry-aligned <?= e($selectedName) ?> training with AI-driven methodology, hands-on projects, and placement support. <?= e($audienceText) ?></p>
            <p><?= e($trainingDurationNote) ?></p>
            <a href="#enquire" class="btn btn-teal" data-open-enquire data-enquiry-topic="<?= e($selectedName) ?>" style="margin-top:1rem">Register Now</a>
        </div>
        <div class="highlight-card">
            <h3>Program Highlights</h3>
            <ul class="check-list">
                <li>Expert trainers with industry experience</li>
                <li>AI-driven learning techniques</li>
                <li>Real-world projects and assessments</li>
                <li>100% placement record support</li>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section">
    <div class="container">
        <p class="section-sub" style="margin-bottom:1.5rem"><?= e($audienceText) ?> <?= e($trainingDurationNote) ?></p>
        <div class="course-grid">
            <?php foreach ($popularCourses as $course):
                $isSelected = $selected === $course['slug'];
            ?>
            <article class="course-card<?= $isSelected ? ' course-card-active' : '' ?>" id="<?= e($course['slug']) ?>">
                <div class="course-card-body">
                    <h3><?= e($course['name']) ?></h3>
                    <p><?= e($course['desc']) ?></p>
                    <div class="rating"><i class="fas fa-star"></i> <?= e($course['rating']) ?> | <?= (int)$course['reviews'] ?> Reviews</div>
                </div>
                <div class="course-card-foot">
                    <a href="courses.php?course=<?= e(urlencode($course['slug'])) ?>" class="btn btn-sm btn-outline">View Details</a>
                    <a href="#enquire" class="btn btn-sm btn-teal" data-open-enquire data-enquiry-topic="<?= e($course['name']) ?>">Register Now</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <h2 class="section-title" style="margin-top:3rem">All Course Categories</h2>
        <div class="mega-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1.5rem;margin-top:1rem">
            <?php foreach ($courseMenu as $category => $items): ?>
            <div class="mega-col" style="background:var(--gray-bg);padding:1rem;border-radius:10px">
                <h4><?= e($category) ?></h4>
                <ul style="list-style:none">
                    <?php foreach ($items as $item): ?>
                    <li><a href="courses.php?course=<?= e(urlencode(courseSlug($item))) ?>"><?= e($item) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
