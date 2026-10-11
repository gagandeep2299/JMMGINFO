    </main>

<?php if (!empty($isHomepage)): ?>
    <footer class="jh-footer">
        <div class="jh-footer-main jh-wrap">
            <div>
                <a class="jh-footer-brand" href="<?= e($homeUrl) ?>" aria-label="JMMG INFORTECH home">
                    <img src="<?= e($root . $logoFull) ?>" alt="">
                    <span><strong>JMMG</strong><small>INFORTECH</small></span>
                </a>
                <div class="jh-footer-contact">
                    <?= e(SITE_ADDRESS) ?><br>
                    <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a><br>
                    <a href="mailto:<?= e(SITE_EMAIL_SALES) ?>"><?= e(SITE_EMAIL_SALES) ?></a>
                </div>
            </div>
            <div class="jh-footer-group">
                <h2>Business</h2>
                <nav class="jh-footer-links" aria-label="Business links">
                    <a href="<?= e($root) ?>pages/services.php">IT Services</a>
                    <a href="<?= e($root) ?>pages/about.php">About JMMG</a>
                    <a href="<?= e($root) ?>pages/contact.php">Contact</a>
                </nav>
            </div>
        </div>
        <div class="jh-footer-bottom">
            <div class="jh-footer-bottom-inner jh-wrap">
                <span>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</span>
                <span><?= e(SITE_TAGLINE) ?></span>
            </div>
        </div>
    </footer>
<?php else: ?>
    <footer class="site-footer">
        <div class="footer-cta">
            <div class="container">
                <div class="footer-cta-grid">
                    <div>
                        <h3>Ready to build your next digital solution?</h3>
                        <p>Custom software, cloud engineering, AI automation, and managed IT support for businesses that want to move faster.</p>
                    </div>
                    <div class="footer-cta-actions">
                        <a href="#enquire" class="btn btn-teal" data-open-enquire>Enquire Now</a>
                        <a href="mailto:<?= e(SITE_EMAIL) ?>" class="btn btn-outline-light">Email Us</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-main">
            <div class="container footer-grid">
                <div class="footer-col">
                    <img src="<?= e($root . $logoFull) ?>" alt="<?= e(SITE_NAME) ?>" class="footer-logo">
                    <p><?= e(SITE_TAGLINE) ?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?= e(SITE_ADDRESS) ?></p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
                    <p><i class="fas fa-headset"></i> Sales: <a href="mailto:<?= e(SITE_EMAIL_SALES) ?>"><?= e(SITE_EMAIL_SALES) ?></a></p>
                    <div class="footer-social">
                        <a href="<?= e(SITE_LINKEDIN) ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Our Focus</h4>
                    <ul>
                        <li><a href="<?= e($root) ?>pages/services.php#ai-product-engineering">AI Product Engineering</a></li>
                        <li><a href="<?= e($root) ?>pages/services.php#custom-software">Custom Software</a></li>
                        <li><a href="<?= e($root) ?>pages/services.php#cloud-modernization">Cloud & DevOps</a></li>
                        <li><a href="<?= e($root) ?>pages/services.php#managed-it-support">Managed IT Support</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="<?= e($root) ?>pages/about.php">About Us</a></li>
                        <li><a href="<?= e($root) ?>pages/services.php">IT Services</a></li>
                        <li><a href="<?= e($root) ?>pages/contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-inner">
                <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
                <ul class="footer-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </footer>
<?php endif; ?>

    <div class="modal" id="enquireModal" aria-hidden="true">
        <div class="modal-backdrop" data-close-enquire></div>
        <div class="modal-dialog" role="dialog" aria-labelledby="enquireTitle">
            <button class="modal-close" data-close-enquire aria-label="Close">&times;</button>
            <h3 id="enquireTitle">Enquire Now</h3>
            <p class="modal-sub">Email: <?= e(SITE_EMAIL) ?></p>
            <form action="<?= e($root) ?>api/enquire.php" method="post" class="enquire-form" id="enquireForm">
                <input type="text" name="name" placeholder="Your Name *" required>
                <input type="email" name="email" placeholder="Email *" required>
                <input type="tel" name="phone" placeholder="Phone *" required>
                <select name="service" required>
                    <option value="">Select an IT service</option>
                    <?php foreach ($services as $svc): ?>
                    <option value="<?= e($svc['title']) ?>"><?= e($svc['title']) ?></option>
                    <?php endforeach; ?>
                </select>
                <textarea name="message" rows="3" placeholder="Message"></textarea>
                <button type="submit" class="btn btn-teal btn-block">Submit Enquiry</button>
            </form>
        </div>
    </div>

    <script src="<?= e($root) ?>assets/js/main.js"></script>
<?php if (!empty($isHomepage)): ?>
    </div>
<?php endif; ?>
</body>
</html>
