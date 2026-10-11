(() => {
    const site = document.getElementById('jmmgHome');
    if (!site) return;

    const storage = {
        get(key) {
            try { return window.localStorage.getItem(key); } catch (_) { return null; }
        },
        set(key, value) {
            try { window.localStorage.setItem(key, value); } catch (_) { /* Storage may be unavailable. */ }
        }
    };

    const viewTabs = Array.from(site.querySelectorAll('[data-home-view-tab]'));
    const viewPanels = {
        finder: site.querySelector('#jh-panel-finder'),
        explore: site.querySelector('#jh-panel-explore')
    };

    const setView = (view, persist = true) => {
        const nextView = view === 'explore' ? 'explore' : 'finder';
        site.dataset.homeView = nextView;

        viewTabs.forEach((tab) => {
            const selected = tab.dataset.homeViewTab === nextView;
            tab.setAttribute('aria-selected', String(selected));
            tab.tabIndex = selected ? 0 : -1;
        });

        Object.entries(viewPanels).forEach(([key, panel]) => {
            const active = key === nextView;
            panel.hidden = !active;
            panel.setAttribute('aria-hidden', String(!active));
        });

        if (persist) storage.set('jmmg.homeView', nextView);
    };

    viewTabs.forEach((tab) => tab.addEventListener('click', () => setView(tab.dataset.homeViewTab)));

    const headerMenus = Array.from(site.querySelectorAll('.jh-nav-menu, .jh-mobile-menu'));
    document.addEventListener('click', (event) => {
        headerMenus.forEach((menu) => {
            if (menu.open && !menu.contains(event.target)) menu.open = false;
        });
    });
    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        headerMenus.forEach((menu) => {
            if (!menu.open) return;
            menu.open = false;
            menu.querySelector('summary')?.focus();
        });
    });
    headerMenus.forEach((menu) => {
        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => { menu.open = false; });
        });
    });

    site.querySelector('[role="tablist"][aria-labelledby="jh-home-view-label"]')?.addEventListener('keydown', (event) => {
        const index = viewTabs.indexOf(document.activeElement);
        let next = index;
        if (event.key === 'ArrowRight' || event.key === 'ArrowDown') next = (index + 1) % viewTabs.length;
        else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') next = (index - 1 + viewTabs.length) % viewTabs.length;
        else if (event.key === 'Home') next = 0;
        else if (event.key === 'End') next = viewTabs.length - 1;
        else return;
        event.preventDefault();
        viewTabs[next].focus();
        setView(viewTabs[next].dataset.homeViewTab);
    });

    const serviceTabs = Array.from(site.querySelectorAll('.jh-home-service-tab'));
    const serviceDetail = site.querySelector('#jh-service-detail');
    const serviceTitle = site.querySelector('#jh-selected-service-title');
    const serviceDescription = site.querySelector('#jh-selected-service-description');
    const serviceDetailsLink = site.querySelector('#jh-service-details');
    const serviceEnquiry = site.querySelector('#jh-service-enquiry');

    const setService = (serviceId, persist = true) => {
        const activeTab = serviceTabs.find((tab) => tab.dataset.serviceId === serviceId) || serviceTabs[0];
        if (!activeTab) return;

        serviceTabs.forEach((tab) => {
            const selected = tab === activeTab;
            tab.setAttribute('aria-selected', String(selected));
            tab.tabIndex = selected ? 0 : -1;
        });

        const { serviceId: id, serviceTitle: title, serviceDescription: description } = activeTab.dataset;
        serviceTitle.textContent = title;
        serviceDescription.textContent = description;
        serviceDetailsLink.href = `pages/services.php#${encodeURIComponent(id)}`;
        serviceEnquiry.dataset.enquiryTopic = title;
        serviceEnquiry.querySelector('span').textContent = `Enquire about ${title}`;
        serviceDetail.setAttribute('aria-labelledby', activeTab.id);

        if (persist) storage.set('jmmg.service', id);
    };

    serviceTabs.forEach((tab) => tab.addEventListener('click', () => setService(tab.dataset.serviceId)));
    site.querySelector('[aria-label="Select an IT service"]')?.addEventListener('keydown', (event) => {
        const index = serviceTabs.indexOf(document.activeElement);
        let next = index;
        if (event.key === 'ArrowDown' || event.key === 'ArrowRight') next = (index + 1) % serviceTabs.length;
        else if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') next = (index - 1 + serviceTabs.length) % serviceTabs.length;
        else if (event.key === 'Home') next = 0;
        else if (event.key === 'End') next = serviceTabs.length - 1;
        else return;
        event.preventDefault();
        serviceTabs[next].focus();
        setService(serviceTabs[next].dataset.serviceId);
    });

    const themeButton = site.querySelector('#jh-theme-toggle');
    const themeIcon = site.querySelector('#jh-theme-icon');
    const themeLabel = site.querySelector('#jh-theme-label');
    const storedTheme = storage.get('jmmg.theme');
    const systemPrefersDark = window.matchMedia?.('(prefers-color-scheme: dark)').matches ?? false;
    const initialTheme = storedTheme === 'light' || storedTheme === 'dark'
        ? storedTheme
        : (systemPrefersDark ? 'dark' : 'light');

    const setTheme = (theme, persist = true) => {
        const isDark = theme === 'dark';
        site.dataset.theme = isDark ? 'dark' : 'light';
        themeButton.setAttribute('aria-pressed', String(isDark));
        themeButton.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');
        themeLabel.textContent = isDark ? 'Light mode' : 'Dark mode';
        themeIcon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        if (persist) storage.set('jmmg.theme', isDark ? 'dark' : 'light');
    };

    themeButton.addEventListener('click', () => setTheme(site.dataset.theme === 'dark' ? 'light' : 'dark'));

    setService(storage.get('jmmg.service'), false);
    setTheme(initialTheme, false);
    setView(storage.get('jmmg.homeView') === 'explore' ? 'explore' : 'finder', false);
})();
