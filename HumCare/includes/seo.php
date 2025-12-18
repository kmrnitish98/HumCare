<?php
// SEO / Open Graph defaults and output.
// Usage: set any of the following variables before including this file:
// $meta_title, $meta_description, $meta_keywords, $meta_image, $meta_type, $meta_robots, $meta_url

$site_name = 'HumCare';
$default_desc = 'HumCare helps you find doctors, book appointments and read trusted health articles — quality care when you need it.';
$default_keywords = 'humcare, healthcare, doctors, appointment, health articles, medical help';
$default_image = 'https://images.unsplash.com/photo-1587502536263-5c6b5c3d0c2c?q=80&w=1200&auto=format&fit=crop';

$meta_title = $meta_title ?? $site_name;
$meta_description = $meta_description ?? $default_desc;
$meta_keywords = $meta_keywords ?? $default_keywords;
$meta_image = $meta_image ?? $default_image;
$meta_type = $meta_type ?? 'website';
$meta_robots = $meta_robots ?? 'index, follow';
$meta_url = $meta_url ?? ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');

// Limit description length for safety
if (strlen($meta_description) > 300) $meta_description = substr($meta_description, 0, 297) . '...';

?>

<title><?= htmlspecialchars($meta_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
<meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
<meta name="robots" content="<?= htmlspecialchars($meta_robots) ?>">
<link rel="canonical" href="<?= htmlspecialchars($meta_url) ?>">

<!-- Open Graph -->
<meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>">
<meta property="og:type" content="<?= htmlspecialchars($meta_type) ?>">
<meta property="og:url" content="<?= htmlspecialchars($meta_url) ?>">
<meta property="og:image" content="<?= htmlspecialchars($meta_image) ?>">
<meta property="og:site_name" content="<?= htmlspecialchars($site_name) ?>">
<meta property="og:locale" content="en_US">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($meta_title) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($meta_description) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($meta_image) ?>">
