    </main>

    <footer class="site-footer">
        <div class="footer-cta">
            <div class="container">
                <div class="footer-cta-grid">
                    <div>
                        <h3>Ready to start your journey?</h3>
                        <p>IT services, payroll & compliance, HR services, and training & internship under one roof.</p>
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
                    <p><i class="fas fa-briefcase"></i> <a href="mailto:<?= e(SITE_EMAIL_CAREERS) ?>"><?= e(SITE_EMAIL_CAREERS) ?></a></p>
                    <div class="footer-social">
                        <a href="<?= e(SITE_LINKEDIN) ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Trending Courses</h4>
                    <ul>
                        <li><a href="<?= e($root) ?>pages/courses.php?course=full-stack">Full Stack</a></li>
                        <li><a href="<?= e($root) ?>pages/courses.php?course=java">Java Training</a></li>
                        <li><a href="<?= e($root) ?>pages/courses.php?course=machine-learning">Machine Learning</a></li>
                        <li><a href="<?= e($root) ?>pages/courses.php?course=python">Python Training</a></li>
                        <li><a href="<?= e($root) ?>pages/courses.php?course=generative-ai">Generative AI</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="<?= e($root) ?>pages/about.php">About Us</a></li>
                        <li><a href="<?= e($root) ?>pages/services.php">Corporate Training</a></li>
                        <li><a href="<?= e($root) ?>pages/services.php#hr-services">HR Services</a></li>
                        <li><a href="<?= e($root) ?>pages/placement.php">Placement</a></li>
                        <li><a href="<?= e($root) ?>pages/contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="<?= e($root) ?>pages/resources.php">Verify Certificates</a></li>
                        <li><a href="<?= e($root) ?>pages/resources.php#payment">Make Payment</a></li>
                        <li><a href="<?= e($root) ?>pages/careers.php">Careers</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-inner">
                <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
                <ul class="footer-links">
                    <li><a href="<?= e($root) ?>pages/careers.php">Careers</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </footer>

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
                <select name="course" required>
                    <option value="">Select Course / Service</option>
                    <?php foreach ($popularCourses as $course): ?>
                    <option value="<?= e($course['name']) ?>"><?= e($course['name']) ?></option>
                    <?php endforeach; ?>
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
</body>
</html>
