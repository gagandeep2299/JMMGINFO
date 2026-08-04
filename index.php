<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = SITE_NAME . ' | IT Services, Payroll, HR & Training';
$root = '';
require_once __DIR__ . '/includes/header.php';
$enquiryStatus = $_GET['enquiry'] ?? '';
?>

<?php if ($enquiryStatus === 'success'): ?>
<div class="container" style="padding-top:1rem"><div class="alert alert-success">Thank you! Your enquiry has been submitted successfully.</div></div>
<?php elseif ($enquiryStatus === 'error'): ?>
<div class="container" style="padding-top:1rem"><div class="alert alert-error">Please fill all required fields.</div></div>
<?php endif; ?>

<section class="hero-slider" id="heroSlider">
    <div class="hero-slides">
        <?php foreach ($heroBanners as $i => $banner): ?>
        <div class="hero-slide<?= $i === 0 ? ' active' : '' ?>" style="background-image:url('<?= e($banner['image']) ?>')">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <p class="hero-kicker">Become competent in tech skills from</p>
                <h1><?= e($banner['title']) ?></h1>
                <p class="hero-sub"><?= e($banner['subtitle']) ?></p>
                <div class="hero-actions">
                    <a href="<?= e($banner['cta_link']) ?>" class="btn btn-teal"><?= e($banner['cta']) ?></a>
                    <a href="#enquire" class="btn btn-outline-light" data-open-enquire>Brochure</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="hero-nav prev" id="heroPrev" aria-label="Previous slide"><i class="fas fa-chevron-left"></i></button>
    <button class="hero-nav next" id="heroNext" aria-label="Next slide"><i class="fas fa-chevron-right"></i></button>
    <div class="hero-dots" id="heroDots"></div>
</section>

<section class="major-services section">
    <div class="container">
        <h2 class="section-title center">Our Major Services</h2>
        <div class="major-services-grid">
            <?php foreach ($majorServices as $ms): ?>
            <a href="<?= e($root . $ms['link']) ?>" class="major-service-card">
                <i class="fas <?= e($ms['icon']) ?>"></i>
                <h3><?= e($ms['title']) ?></h3>
                <p><?= e($ms['desc']) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="hero-tabs">
    <div class="container">
        <div class="tab-pills">
            <button class="tab-pill active" data-tab="training">Training & Internship</button>
            <button class="tab-pill" data-tab="payroll">Payroll & Compliance</button>
            <button class="tab-pill" data-tab="hr">HR Services</button>
            <button class="tab-pill" data-tab="it">IT Services</button>
        </div>
        <div class="tab-panel active" id="tab-training">
            <form class="inline-enquire" action="api/enquire.php" method="post">
                <h3>Enquire Now</h3>
                <input type="text" name="name" placeholder="Name *" required>
                <input type="email" name="email" placeholder="Email *" required>
                <input type="tel" name="phone" placeholder="Phone *" required>
                <select name="course" required>
                    <option value="">Select Course</option>
                    <?php foreach ($popularCourses as $c): ?>
                    <option value="<?= e($c['name']) ?>"><?= e($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-teal">Submit</button>
            </form>
        </div>
    </div>
</section>

<section class="stats-bar">
    <div class="container stats-grid">
        <?php foreach ($stats as $stat): ?>
        <div class="stat-item">
            <strong><?= e($stat['value']) ?></strong>
            <span><?= e($stat['label']) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="highlights section">
    <div class="container highlights-grid">
        <article class="highlight-card">
            <i class="fas fa-users"></i>
            <h3>Best Manpower Services</h3>
        </article>
        <article class="highlight-card">
            <i class="fas fa-user-graduate"></i>
            <h3>Candidates Trained<br><span>500000+</span></h3>
        </article>
        <article class="highlight-card">
            <i class="fas fa-chart-line"></i>
            <h3>Success Ratio<br><span>99%</span></h3>
        </article>
        <article class="highlight-card">
            <i class="fas fa-building"></i>
            <h3>Corporate Training<br><span>For India & Abroad</span></h3>
        </article>
        <article class="highlight-card">
            <i class="fas fa-briefcase"></i>
            <h3>AI Based IT Product<br><span>and Services</span></h3>
        </article>
        <article class="highlight-card">
            <i class="fas fa-code"></i>
            <h3>IT Development & Support</h3>
        </article>
    </div>
</section>

<section class="section" id="courses">
    <div class="container">
        <div class="section-head">
            <h2>Popular Courses</h2>
            <a href="pages/courses.php" class="link-more">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="course-grid">
            <?php foreach ($popularCourses as $course): ?>
            <article class="course-card">
                <div class="course-card-body">
                    <h3><?= e($course['name']) ?></h3>
                    <p><?= e($course['desc']) ?></p>
                    <div class="rating"><i class="fas fa-star"></i> <?= e($course['rating']) ?> | <?= (int)$course['reviews'] ?> Reviews</div>
                </div>
                <div class="course-card-foot">
                    <a href="pages/courses.php?course=<?= e($course['slug']) ?>" class="btn btn-sm btn-outline">Read More</a>
                    <a href="#enquire" class="btn btn-sm btn-teal" data-open-enquire>Register Now</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="counter-banner section-dark">
    <div class="container counter-grid">
        <div><strong>500000+</strong><span>CANDIDATES</span></div>
        <div><strong>50+</strong><span>COURSES</span></div>
        <div><strong>100+</strong><span>CLIENTS</span></div>
        <div><strong>10+</strong><span>YEARS SERVING</span></div>
    </div>
</section>

<section class="section" id="services">
    <div class="container">
        <h2 class="section-title center">Our Services</h2>
        <div class="service-tabs" id="serviceTabs">
            <?php foreach ($services as $i => $svc): ?>
            <button class="service-tab<?= $i === 0 ? ' active' : '' ?>" data-service="<?= $i ?>"><?= e($svc['title']) ?></button>
            <?php endforeach; ?>
        </div>
        <div class="service-panels">
            <?php foreach ($services as $i => $svc): ?>
            <div class="service-panel<?= $i === 0 ? ' active' : '' ?>" data-panel="<?= $i ?>">
                <div class="service-panel-inner">
                    <i class="fas <?= e($svc['icon']) ?>"></i>
                    <h3><?= e($svc['title']) ?></h3>
                    <p><?= e($svc['desc']) ?></p>
                    <div class="service-actions">
                        <a href="pages/services.php#<?= e($svc['id']) ?>" class="btn btn-outline">Know More</a>
                        <a href="#enquire" class="btn btn-teal" data-open-enquire>Enquiry Now</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container two-col">
        <div>
            <h2>Why Choose <?= e(SITE_NAME) ?>?</h2>
            <ul class="check-list">
                <li>Expertise across Training, Payroll & Compliance, IT & HR Services</li>
                <li>Tailored solutions for corporates and campuses</li>
                <li>AI-driven learning and delivery</li>
                <li>100% Placement record</li>
            </ul>
        </div>
        <div class="img-card">
            <img src="<?= e(ASSETS_URL . '/' . $imgAboutTeam) ?>" alt="<?= e(SITE_NAME) ?> team">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title center">What People Say</h2>
        <div class="testimonial-slider" id="testimonialSlider">
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

<section class="section section-alt" id="blogs">
    <div class="container">
        <h2 class="section-title center">Latest Blogs</h2>
        <div class="blog-grid">
            <?php foreach ($blogs as $blog): ?>
            <article class="blog-card">
                <span class="blog-meta"><?= e(SITE_NAME) ?> Team</span>
                <h3><?= e($blog['title']) ?></h3>
                <p><?= e($blog['excerpt']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="partners section">
    <div class="container">
        <h2 class="section-title center">Academic Partners</h2>
        <p class="section-sub center">Welcoming students from prestigious institutions across India.</p>
        <img src="<?= e(ASSETS_URL . '/' . $imgPartners) ?>" alt="Partner institutions" class="partners-img">
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
