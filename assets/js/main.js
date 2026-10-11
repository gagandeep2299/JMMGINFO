(function () {

    const navToggle = document.getElementById('navToggle');

    const mainNav = document.getElementById('mainNav');

    const navBackdrop = document.getElementById('navBackdrop');

    const siteHeader = document.getElementById('siteHeader');

    const MOBILE_NAV_MQ = window.matchMedia('(max-width: 1024px)');
    const TOUCH_MQ = window.matchMedia('(hover: none), (pointer: coarse)');

    function isMobileNav() {
        return MOBILE_NAV_MQ.matches;
    }

    function useTapDropdowns() {
        return isMobileNav() || TOUCH_MQ.matches;
    }



    function setNavOpen(open) {

        mainNav?.classList.toggle('open', open);

        navToggle?.classList.toggle('active', open);

        navBackdrop?.classList.toggle('visible', open);

        document.body.classList.toggle('nav-open', open);

        navToggle?.setAttribute('aria-expanded', open ? 'true' : 'false');

        navBackdrop?.setAttribute('aria-hidden', open ? 'false' : 'true');

        if (!open) {

            document.querySelectorAll('.nav-item.open').forEach((el) => el.classList.remove('open'));

        }

    }



    function closeNav() {

        setNavOpen(false);

    }



    function openNav() {

        setNavOpen(true);

    }



    navToggle?.addEventListener('click', () => {

        if (mainNav?.classList.contains('open')) closeNav();

        else openNav();

    });



    navBackdrop?.addEventListener('click', closeNav);



    document.querySelectorAll('.nav-item.has-dropdown > a, .nav-item.has-mega > a').forEach((link) => {

        link.addEventListener('click', (e) => {

            if (!useTapDropdowns()) return;

            const parent = link.parentElement;

            const isOpen = parent.classList.contains('open');



            e.preventDefault();



            document.querySelectorAll('.nav-item.has-dropdown.open, .nav-item.has-mega.open').forEach((item) => {

                if (item !== parent) item.classList.remove('open');

            });



            parent.classList.toggle('open', !isOpen);

        });

    });



    document.querySelectorAll('.dropdown-submenu-label').forEach((label) => {

        label.addEventListener('click', (e) => {

            if (!useTapDropdowns()) return;
            e.preventDefault();
            e.stopPropagation();

            label.parentElement.classList.toggle('open');

        });

    });



    mainNav?.querySelectorAll('.dropdown a, .mega-menu a').forEach((link) => {

        link.addEventListener('click', () => {

            if (isMobileNav()) closeNav();

        });

    });



    mainNav?.querySelectorAll('.nav-item:not(.has-dropdown):not(.has-mega) > a').forEach((link) => {

        link.addEventListener('click', () => {

            if (isMobileNav()) closeNav();

        });

    });



    MOBILE_NAV_MQ.addEventListener('change', () => {

        if (!isMobileNav()) closeNav();

    });



    document.addEventListener('keydown', (e) => {

        if (e.key === 'Escape') closeNav();

    });



    const slides = document.querySelectorAll('.hero-slide');

    const dotsContainer = document.getElementById('heroDots');

    let currentSlide = 0;

    let slideTimer;



    function goToSlide(index) {

        if (!slides.length) return;

        currentSlide = (index + slides.length) % slides.length;

        slides.forEach((s, i) => s.classList.toggle('active', i === currentSlide));

        if (dotsContainer) {

            dotsContainer.querySelectorAll('button').forEach((d, i) => d.classList.toggle('active', i === currentSlide));

        }

    }



    if (slides.length && dotsContainer) {

        slides.forEach((_, i) => {

            const dot = document.createElement('button');

            dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));

            if (i === 0) dot.classList.add('active');

            dot.addEventListener('click', () => {

                goToSlide(i);

                resetTimer();

            });

            dotsContainer.appendChild(dot);

        });



        document.getElementById('heroPrev')?.addEventListener('click', () => {

            goToSlide(currentSlide - 1);

            resetTimer();

        });

        document.getElementById('heroNext')?.addEventListener('click', () => {

            goToSlide(currentSlide + 1);

            resetTimer();

        });



        function resetTimer() {

            clearInterval(slideTimer);

            slideTimer = setInterval(() => goToSlide(currentSlide + 1), 6000);

        }

        resetTimer();

    }



    document.querySelectorAll('.service-tab').forEach((tab) => {

        tab.addEventListener('click', () => {

            const idx = tab.dataset.service;

            document.querySelectorAll('.service-tab').forEach((t) => t.classList.remove('active'));

            document.querySelectorAll('.service-panel').forEach((p) => p.classList.remove('active'));

            tab.classList.add('active');

            document.querySelector('.service-panel[data-panel="' + idx + '"]')?.classList.add('active');

        });

    });



    const modal = document.getElementById('enquireModal');

    const openBtns = document.querySelectorAll('[data-open-enquire]');

    const closeBtns = document.querySelectorAll('[data-close-enquire]');



    function setEnquiryTopic(topic) {

        const select = document.querySelector('#enquireForm select[name="service"]');

        if (!select || !topic) return;

        let found = false;

        for (const opt of select.options) {

            if (opt.value === topic) {

                select.value = topic;

                found = true;

                break;

            }

        }

        if (!found) {

            const option = new Option(topic, topic);

            select.add(option);

            select.value = topic;

        }

    }



    function openModal(topic) {

        if (topic) setEnquiryTopic(topic);

        modal?.classList.add('open');

        modal?.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';

    }



    function closeModal() {

        modal?.classList.remove('open');

        modal?.setAttribute('aria-hidden', 'true');

        if (!mainNav?.classList.contains('open')) {

            document.body.style.overflow = '';

        }

    }



    openBtns.forEach((btn) => {

        btn.addEventListener('click', (e) => {

            if (btn.getAttribute('href') === '#enquire') e.preventDefault();

            openModal(btn.dataset.enquiryTopic || '');

        });

    });

    closeBtns.forEach((btn) => btn.addEventListener('click', closeModal));



    if (window.location.hash === '#enquire') openModal();



    window.addEventListener('scroll', () => {

        if (siteHeader) {

            siteHeader.classList.toggle('scrolled', window.scrollY > 40);

        }

    });



    function initTestimonialSlider(sliderId) {

        const slider = document.getElementById(sliderId);

        if (!slider) return;

        const track = slider.querySelector('.testimonial-track');

        const cards = track?.querySelectorAll('.testimonial-card');

        if (!track || !cards?.length) return;



        let index = 0;

        const visible = window.innerWidth >= 768 ? 3 : 1;

        const maxIndex = Math.max(0, cards.length - visible);



        function slide() {

            const card = cards[0];

            const gap = 20;

            const offset = (card.offsetWidth + gap) * index;

            track.style.transform = 'translateX(-' + offset + 'px)';

        }



        setInterval(() => {

            index = index >= maxIndex ? 0 : index + 1;

            slide();

        }, 4500);



        window.addEventListener('resize', () => {

            index = 0;

            slide();

        });

    }

})();

