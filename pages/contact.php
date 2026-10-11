<?php
require_once dirname(__DIR__) . '/includes/config.php';
$root = '../';
$pageTitle = 'Contact Us | ' . SITE_NAME;
$enquiryStatus = $_GET['enquiry'] ?? '';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="ji-page">
    <section class="ji-section">
        <div class="ji-wrap ji-contact-grid">
            <div class="ji-form-panel">
                <span class="ji-eyebrow">Contact JMMG</span>
                <h1>Send an enquiry.</h1>
                <p>Tell us what you are working on. Our team will get back to you.</p>
                <p class="ji-breadcrumb ji-breadcrumb-dark"><a href="../index.php">Home</a> / Contact</p>
            <?php if ($enquiryStatus === 'success'): ?>
            <div class="alert alert-success">Thank you! We will contact you shortly.</div>
            <?php elseif ($enquiryStatus === 'error'): ?>
            <div class="alert alert-error">Please fill all required fields.</div>
            <?php endif; ?>
                <form class="ji-form" action="../api/enquire.php" method="post">
                    <label>Name<input type="text" name="name" placeholder="Your name" autocomplete="name" required></label>
                    <label>Email<input type="email" name="email" placeholder="you@company.com" autocomplete="email" required></label>
                    <label>Phone<input type="tel" name="phone" placeholder="Your phone number" autocomplete="tel" required></label>
                    <label>IT service
                        <select name="service" required>
                            <option value="">Choose an IT service</option>
                            <?php foreach ($services as $svc): ?>
                            <option value="<?= e($svc['title']) ?>"><?= e($svc['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="ji-field-full">Tell us how we can help<textarea name="message" rows="4" placeholder="A little context helps us route your enquiry." required></textarea></label>
                    <button type="submit" class="ji-button">Send enquiry <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                </form>
            </div>

            <aside class="ji-contact-aside">
                <span class="ji-eyebrow">Contact directly</span>
                <h2>Speak with our team.</h2>
                <p><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
                <p>Sales: <a href="mailto:<?= e(SITE_EMAIL_SALES) ?>"><?= e(SITE_EMAIL_SALES) ?></a></p>
                <p><?= e(SITE_ADDRESS) ?></p>
                <p><a href="<?= e(SITE_LINKEDIN) ?>" target="_blank" rel="noopener">LinkedIn</a> · <a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener">Instagram</a></p>
                <div class="ji-example-list" aria-label="Common enquiry topics">
                    <span>Plan a software or AI product</span>
                    <span>Modernize cloud infrastructure</span>
                    <span>Arrange ongoing IT support</span>
                </div>
            </aside>
        </div>
    </section>
</div>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
