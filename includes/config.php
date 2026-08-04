<?php

declare(strict_types=1);



define('SITE_NAME', 'JMMG INFORTECH');

define('SITE_TAGLINE', 'Empowering Businesses. Enabling Growth.');

define('SITE_EMAIL', 'info@jmmginfo.in');

define('SITE_EMAIL_CAREERS', 'sales@jmmginfo.in');

define('SITE_ADDRESS', 'Noida, Uttar Pradesh, India');

define('SITE_LINKEDIN', 'https://www.linkedin.com/company/107438295/');

define('SITE_INSTAGRAM', 'https://www.instagram.com/yugrathoventures?utm_source=qr&igsh=MWlkNDNxZjZmcTBqbg==');

define('MOCK_INTERVIEW_KEY', 'yugratho-campus-mock-2026');

define('MOCK_INTERVIEW_FORM_URL', '');

define('BASE_PATH', dirname(__DIR__));

define('ASSETS_URL', 'images');

$logoIcon = ASSETS_URL . '/logo.jpg';
$logoFull = ASSETS_URL . '/logo.jpg';

$imgHeroTraining = 'hero-training.jpeg';
$imgHeroPayroll = 'hero-payroll.jpeg';
$imgHeroCampus = 'hero-campus.jpeg';
$imgHeroCorporate = 'hero-corporate.jpeg';
$imgHeroIt = 'hero-it.jpeg';
$imgHeroPlacement = 'hero-placement.jpeg';
$imgAboutTeam = 'about-team.jpeg';
$imgPartners = 'partners.jpeg';
$imgGallery01 = 'gallery-01.jpeg';
$imgGallery02 = 'gallery-02.jpeg';



$audienceText = 'Most suitable for B.Tech, M.Tech, MCA, BBA, MBA, Graduation, and related programs.';

$trainingDurationNote = 'Programs from 45 days to 6 months — industrial training and internship options available.';



$majorServices = [

    ['id' => 'it-services', 'title' => 'IT Services', 'icon' => 'fa-code', 'desc' => 'AI-based IT products, custom development, and scalable technology solutions for startups to enterprises.', 'link' => 'pages/services.php#it-development'],

    ['id' => 'payroll-compliance', 'title' => 'Payroll & Compliance', 'icon' => 'fa-calculator', 'desc' => 'Accurate payroll processing, statutory compliance, PF, ESIC, TDS, and ongoing labor-law support.', 'link' => 'pages/services.php#payroll-compliance'],

    ['id' => 'hr-services', 'title' => 'HR Services', 'icon' => 'fa-user-tie', 'desc' => 'Recruitment, RPO, and manpower solutions to build and manage your workforce effectively.', 'link' => 'pages/services.php#hr-services'],

    ['id' => 'training-internship', 'title' => 'Training & Internship', 'icon' => 'fa-graduation-cap', 'desc' => 'Campus, corporate, summer, and industrial training with AI-driven methodology and placement support.', 'link' => 'pages/services.php#campus'],

];



$heroBanners = [

    ['image' => ASSETS_URL . '/' . $imgHeroTraining, 'title' => 'Training Today. Leaders Tomorrow.', 'subtitle' => 'Expert-led technical & non-technical training with AI-driven methodology and real-world exposure.', 'cta' => 'Enquire Now', 'cta_link' => '#enquire'],

    ['image' => ASSETS_URL . '/' . $imgHeroPayroll, 'title' => 'Payroll & Compliance Services', 'subtitle' => 'End-to-end payroll with statutory compliance and dedicated support.', 'cta' => 'Know More', 'cta_link' => 'pages/services.php#payroll-compliance'],

    ['image' => ASSETS_URL . '/' . $imgHeroCampus, 'title' => 'Partnering with Prestigious Institutions', 'subtitle' => 'Campus training and internship programs across leading colleges.', 'cta' => 'Campus Training', 'cta_link' => 'pages/services.php#campus'],

    ['image' => ASSETS_URL . '/' . $imgHeroCorporate, 'title' => 'Corporate Training Solutions', 'subtitle' => 'Tailored AI-driven programs for teams across India and abroad.', 'cta' => 'Get Brochure', 'cta_link' => '#enquire'],

    ['image' => ASSETS_URL . '/' . $imgHeroIt, 'title' => 'AI Based IT Product and Services', 'subtitle' => 'Secure, scalable software solutions powered by AI methodology and techniques.', 'cta' => 'Our Services', 'cta_link' => 'pages/services.php#it-development'],

    ['image' => ASSETS_URL . '/' . $imgHeroPlacement, 'title' => '100% Placement Record', 'subtitle' => 'Industry-aligned curriculum with dedicated placement support.', 'cta' => 'Register Now', 'cta_link' => '#enquire'],

];



$stats = [

    ['value' => '500000+', 'label' => 'Candidates Trained'],

    ['value' => '50+', 'label' => 'Courses & Programs'],

    ['value' => '100+', 'label' => 'Corporate Clients'],

    ['value' => '10+', 'label' => 'Years Serving'],

];



$popularCourses = [

    ['name' => 'Python', 'desc' => 'Learn Python with industry experts, AI techniques, and certification. ' . $trainingDurationNote, 'rating' => '5.0', 'reviews' => 17, 'slug' => 'python'],

    ['name' => 'Machine Learning', 'desc' => 'Acquire ML expertise with hands-on projects and AI methodology. ' . $trainingDurationNote, 'rating' => '5.0', 'reviews' => 12, 'slug' => 'machine-learning'],

    ['name' => 'Full Stack', 'desc' => 'Secure your future with full stack certification. ' . $audienceText, 'rating' => '5.0', 'reviews' => 8, 'slug' => 'full-stack'],

    ['name' => 'Java', 'desc' => 'Build a great career with Java certification. ' . $trainingDurationNote, 'rating' => '5.0', 'reviews' => 31, 'slug' => 'java'],

    ['name' => 'Generative AI', 'desc' => 'Master prompt engineering and AI agents with modern AI techniques.', 'rating' => '5.0', 'reviews' => 9, 'slug' => 'generative-ai'],

    ['name' => 'Data Analytics', 'desc' => 'Be a DA professional with the right skills. ' . $audienceText, 'rating' => '5.0', 'reviews' => 10, 'slug' => 'data-analytics'],

    ['name' => 'Cloud Computing', 'desc' => 'AWS, Azure & Google Cloud training. ' . $trainingDurationNote, 'rating' => '5.0', 'reviews' => 14, 'slug' => 'cloud'],

    ['name' => 'AutoCAD', 'desc' => 'AutoCAD certification for a dazzling career. ' . $audienceText, 'rating' => '5.0', 'reviews' => 15, 'slug' => 'autocad'],

];



$services = [

    ['id' => 'campus', 'title' => 'Campus Training', 'icon' => 'fa-university', 'desc' => 'On-campus programs with real-time industry exposure. ' . $audienceText . ' ' . $trainingDurationNote],

    ['id' => 'corporate', 'title' => 'Corporate Training', 'icon' => 'fa-building', 'desc' => 'Upgrade employee skills using AI methodology and techniques with customized corporate learning paths.'],

    ['id' => 'fresher', 'title' => 'Fresher Training', 'icon' => 'fa-user-graduate', 'desc' => 'Summer, winter and industrial training for fresh graduates. ' . $audienceText],

    ['id' => 'industrial', 'title' => '45 Days to 6 Months Industrial Training/Internship', 'icon' => 'fa-industry', 'desc' => 'Flexible industrial training and internship from 45 days to 6 months for CS, IT, BCA, MCA, B.Tech, M.Tech, BBA, MBA, and graduates.'],

    ['id' => 'it-development', 'title' => 'IT Development', 'icon' => 'fa-code', 'desc' => 'AI-based IT products and custom software with secure, high-performing solutions delivered on time.'],

    ['id' => 'online', 'title' => 'Online Training', 'icon' => 'fa-laptop', 'desc' => 'Live online sessions with AI-driven learning in software testing, Java, cloud, digital marketing and more.'],

    ['id' => 'overseas', 'title' => 'Overseas Training', 'icon' => 'fa-globe', 'desc' => 'ISO-aligned overseas training programs for global career readiness. ' . $audienceText],

    ['id' => 'placement', 'title' => 'Placement Services', 'icon' => 'fa-briefcase', 'desc' => 'Dedicated placement cell with 100% placement record and industry-aligned curricula.'],

    ['id' => 'payroll-compliance', 'title' => 'Payroll & Compliance Services', 'icon' => 'fa-calculator', 'desc' => 'Accurate payroll processing, TDS, payslips, PF, ESIC, labor law, gratuity and ongoing compliance monitoring.'],

    ['id' => 'hr-services', 'title' => 'HR Services', 'icon' => 'fa-user-tie', 'desc' => 'End-to-end HR and manpower solutions including recruitment, RPO, and workforce management.'],

    ['id' => 'recruitment', 'title' => 'Recruitment Services', 'icon' => 'fa-users', 'desc' => 'Manpower recruitment and RPO solutions for scalable workforce needs.'],

    ['id' => 'summer', 'title' => 'Summer Training/Internship', 'icon' => 'fa-sun', 'desc' => 'Summer training and internship for B.Tech, M.Tech, MCA, BBA, MBA, Graduation, and engineering students with placement support.'],

];



$courseMenu = [

    'Top Trending' => ['Generative AI', 'Agentic AI', 'Prompt Engineering', 'Full Stack', 'Java', 'Python', 'Machine Learning', 'Snowflake'],

    'Programming' => ['Java', 'Python', 'PHP', 'React JS', 'Angular', 'C & C++', 'C# .NET Core', 'Data Structures'],

    'Full Stack' => ['Full Stack with Java', 'Full Stack with Python', 'MERN Stack', 'MEAN Stack', 'Full Stack with .NET'],

    'Cloud & DevOps' => ['AWS', 'Microsoft Azure', 'Google Cloud', 'DevOps Training', 'Cloud Computing'],

    'Data Science' => ['Data Science with Python', 'Data Analytics', 'Machine Learning', 'Big Data Hadoop'],

    'Web & Mobile' => ['Web Designing', 'Android', 'Flutter', 'React Native', 'Laravel'],

    'CAD & Mechanical' => ['AutoCAD', 'STAAD.Pro', 'Revit', 'SolidWorks', '3DS Max'],

    'Networking' => ['CCNA', 'CCNP', 'Cyber Security', 'Blockchain'],

];



$testimonials = [

    ['name' => 'Rahul Sharma', 'course' => 'Full Stack Training', 'text' => 'JMMG INFORTECH provided excellent hands-on training with AI-driven techniques. I got placed within two months of completing the program.'],

    ['name' => 'Priya Verma', 'course' => 'Python & ML', 'text' => 'Trainers are highly experienced. The curriculum is perfectly aligned with industry requirements.'],

    ['name' => 'Amit Kumar', 'course' => 'Industrial Training/Internship', 'text' => 'Best 45-day to 6-month industrial training experience. Real projects and great mentorship throughout.'],

    ['name' => 'Neha Singh', 'course' => 'Corporate Training', 'text' => 'Our team upskilled quickly with JMMG INFORTECH\'s corporate program. Practical, AI-focused, and well structured.'],

    ['name' => 'Vikash Patel', 'course' => 'Payroll & Compliance', 'text' => 'Reliable payroll and compliance support. Accurate processing and responsive team every month.'],

    ['name' => 'Sneha Gupta', 'course' => 'Campus Training', 'text' => 'Campus sessions were engaging and career-focused. Students gained confidence for placements and internships.'],

];



$blogs = [

    ['title' => 'Getting Started with Prompt Engineering', 'excerpt' => 'A practical beginner\'s guide to prompt engineering for modern AI workflows.'],

    ['title' => 'Generative and Agentic AI for Enterprise', 'excerpt' => 'How businesses can decode and adopt generative AI responsibly.'],

    ['title' => '10 Reasons to Learn Python in 2026', 'excerpt' => 'Why Python remains the top choice for developers and data scientists.'],

];



$itServicesNav = [
    'Ticketing tool solution',
    'Cloud service migration',
    'Cloud service support',
    'Cloud native microservices',
    'Billing and mediation solution & service',
    'Web development',
    'IT tool development',
    'AI agent',
    'AI agent workflow',
    'Company owned LLM solution',
    'New software - Finance',
    'New software - Stock',
    'New software - Agriculture',
    'New software - Medical',
    'New software - IT',
    'New software - Telecom (Billing and Charging)',
];

$careerJobs = [
    ['title' => 'Software Developer', 'location' => 'Noida', 'type' => 'Full-time', 'apply_url' => 'mailto:' . SITE_EMAIL_CAREERS . '?subject=Application%20-%20Software%20Developer'],
    ['title' => 'HR Executive', 'location' => 'Noida / Delhi NCR', 'type' => 'Full-time', 'apply_url' => 'mailto:' . SITE_EMAIL_CAREERS . '?subject=Application%20-%20HR%20Executive'],
    ['title' => 'Corporate Trainer', 'location' => 'Noida', 'type' => 'Full-time / Part-time', 'apply_url' => 'mailto:' . SITE_EMAIL_CAREERS . '?subject=Application%20-%20Corporate%20Trainer'],
    ['title' => 'Business Development Executive', 'location' => 'Remote / Noida', 'type' => 'Full-time', 'apply_url' => 'mailto:' . SITE_EMAIL_CAREERS . '?subject=Application%20-%20Business%20Development'],
    ['title' => 'Cloud Support Engineer', 'location' => 'Noida', 'type' => 'Full-time', 'apply_url' => 'mailto:' . SITE_EMAIL_CAREERS . '?subject=Application%20-%20Cloud%20Support%20Engineer'],
];

$hrGallery = [
    $imgGallery01,
    $imgGallery02,
    $imgHeroCampus,
    $imgHeroCorporate,
    $imgHeroTraining,
    $imgHeroPlacement,
];

$serviceImages = [
    'campus' => $imgHeroCampus,
    'corporate' => $imgHeroCorporate,
    'fresher' => $imgHeroTraining,
    'industrial' => $imgHeroTraining,
    'online' => $imgHeroIt,
    'overseas' => $imgHeroCorporate,
    'placement' => $imgHeroPlacement,
    'payroll-compliance' => $imgHeroPayroll,
    'hr-services' => $imgGallery01,
    'recruitment' => $imgGallery01,
    'it-development' => $imgHeroIt,
    'summer' => $imgHeroCampus,
    'default' => $imgHeroIt,
];



$trainingPrograms = [
    ['label' => 'B-tech/BCA/MCA/M-Tech', 'slug' => 'btech-bca-mca-mtech', 'type' => 'course'],
    ['label' => 'BBA/MBA', 'slug' => 'bba-mba', 'type' => 'course'],
    ['label' => 'Graduation', 'slug' => 'graduation', 'type' => 'course'],
    ['label' => 'Corporates', 'slug' => 'corporate', 'type' => 'service'],
    ['label' => 'Colleges', 'slug' => 'campus', 'type' => 'service'],
    ['label' => 'Any Others', 'slug' => 'any-others', 'type' => 'enquire'],
];

function navEnquiryTopic(string $topic): string {
    return ' data-open-enquire data-enquiry-topic="' . e($topic) . '" href="#enquire"';
}

function courseSlug(string $name): string {
    return strtolower(str_replace(' ', '-', $name));
}

function trainingProgramItemUrl(string $root, array $program): string {
    return match ($program['type']) {
        'service' => $root . 'pages/services.php#' . $program['slug'],
        'course' => $root . 'pages/courses.php?course=' . urlencode($program['slug']),
        default => $root . 'pages/courses.php',
    };
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

