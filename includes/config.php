<?php

declare(strict_types=1);



define('SITE_NAME', 'JMMG INFORTECH');

define('SITE_TAGLINE', 'Empowering Businesses. Enabling Growth.');

define('SITE_EMAIL', 'info@jmmginfo.in');

define('SITE_EMAIL_SALES', 'sales@jmmginfo.in');

define('SITE_ADDRESS', 'Noida, Uttar Pradesh, India');

define('SITE_LINKEDIN', 'https://www.linkedin.com/company/107438295/');

define('SITE_INSTAGRAM', 'https://www.instagram.com/yugrathoventures?utm_source=qr&igsh=MWlkNDNxZjZmcTBqbg==');

define('BASE_PATH', dirname(__DIR__));

define('ASSETS_URL', 'images');

$logoIcon = ASSETS_URL . '/logo.jpg';
$logoFull = ASSETS_URL . '/logo.jpg';

$services = [

    ['id' => 'ai-product-engineering', 'title' => 'AI Product Engineering', 'icon' => 'fa-robot', 'desc' => 'Design and implement AI-powered products, assistants, and automation workflows that accelerate decision-making and productivity.'],

    ['id' => 'custom-software', 'title' => 'Custom Software Development', 'icon' => 'fa-code', 'desc' => 'Build scalable web, mobile, and enterprise applications aligned with your business goals, users, and workflows.'],

    ['id' => 'cloud-modernization', 'title' => 'Cloud Migration & DevOps', 'icon' => 'fa-cloud', 'desc' => 'Transform legacy systems with cloud architecture, CI/CD pipelines, infrastructure automation, and production support.'],

    ['id' => 'microservices', 'title' => 'Cloud-Native Microservices', 'icon' => 'fa-network-wired', 'desc' => 'Modernize your digital systems with modular, resilient services designed to scale with business growth.'],

    ['id' => 'ticketing-tools', 'title' => 'Ticketing & Workflow Tools', 'icon' => 'fa-ticket-alt', 'desc' => 'Create IT helpdesk, support workflows, and operational tools that improve visibility and reduce response time.'],

    ['id' => 'managed-it-support', 'title' => 'Managed IT Support', 'icon' => 'fa-headset', 'desc' => 'Keep operations stable with proactive maintenance, monitoring, troubleshooting, and SLA-backed technical support.'],

];



$itServicesNav = [
    'AI Product Engineering',
    'Custom Software Development',
    'Cloud Migration & DevOps',
    'Cloud-Native Microservices',
    'Ticketing & Workflow Tools',
    'Managed IT Support',
];

function navEnquiryTopic(string $topic): string {
    return ' data-open-enquire data-enquiry-topic="' . e($topic) . '" href="#enquire"';
}

function pageUrl(string $page = ''): string {

    $base = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');

    if (basename($base) === 'pages') {

        $base = dirname($base);

    }

    return $base . ($page ? '/' . ltrim($page, '/') : '');

}



function isActivePage(string $page): bool {

    $current = basename($_SERVER['PHP_SELF'] ?? 'index.php');

    return $current === $page;

}



function e(string $value): string {

    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

}

