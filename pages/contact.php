<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Contact Us | ' . SITE_NAME;
$enquiryStatus = $_GET['enquiry'] ?? '';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="breadcrumb"><a href="../index.php">Home</a> / Contact</p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <div>
            <?php if ($enquiryStatus === 'success'): ?>
            <div class="alert alert-success">Thank you! We will contact you shortly.</div>
            <?php elseif ($enquiryStatus === 'error'): ?>
            <div class="alert alert-error">Please fill all required fields.</div>
            <?php endif; ?>
            <form class="contact-form" action="../api/enquire.php" method="post">
                <h2>Send Enquiry</h2>
                <input type="text" name="name" placeholder="Your Name *" required>
                <input type="email" name="email" placeholder="Email *" required>
                <input type="tel" name="phone" placeholder="Phone *" required>
                <select name="course" required>
                    <option value="">Select Course / Service</option>
                    <?php foreach ($popularCourses as $course): ?>
                    <option value="<?= e($course['name']) ?>"><?= e($course['name']) ?></option>
                    <?php endforeach; ?>
                    <?php foreach ($services as $svc): ?>
                    <option value="<?= e($svc['title']) ?>"><?= e($svc['title']) ?></option>
                    <?php endforeach; ?>
                </select>
                <textarea name="message" rows="4" placeholder="Your Message"></textarea>
                <button type="submit" class="btn btn-teal">Submit</button>
            </form>
        </div>
        <div class="contact-info-card">
            <h2>Get In Touch</h2>
            <p><i class="fas fa-envelope"></i> <a href="mailto:<?= e(SITE_EMAIL) ?>" style="color:#fff"><?= e(SITE_EMAIL) ?></a></p>
            <p><i class="fas fa-briefcase"></i> <a href="mailto:<?= e(SITE_EMAIL_CAREERS) ?>" style="color:#fff"><?= e(SITE_EMAIL_CAREERS) ?></a></p>
            <p><i class="fas fa-map-marker-alt"></i> <?= e(SITE_ADDRESS) ?></p>
            <div class="footer-social" style="margin-top:1rem">
                <a href="<?= e(SITE_LINKEDIN) ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
            <a href="#enquire" class="btn btn-teal" data-open-enquire style="margin-top:1rem">Quick Enquiry</a>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
