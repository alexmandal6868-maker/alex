<?php
/**
 * NEPAL TOURISM - CENTRAL ROUTER SYSTEM
 * Single entry point for all pages
 */

// Start session
session_start();

// Include configuration
include 'config.php';

// Get current page from URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define valid pages and their file mappings
$pages = [
    'home'          => 'index.php',
    'tour'          => 'tour.php',
    'lakes'         => 'aichatbook.php',
    'parks'         => 'park.php',
    'login'         => 'login.php',
    'dashboard'     => 'dashboard.php',
    'admin'         => 'dashboard.php',
    'user'          => 'user_dashboard.php',
    'user_dashboard' => 'user_dashboard.php',
    'profile'       => 'user_profile.php',
];

// Include header
include 'header.php';

// Route to correct page
if (isset($pages[$page]) && file_exists($pages[$page])) {
    include $pages[$page];
} else {
    // Default to home page
    include 'index.php';
}

// Include footer
include 'footer.php';
?>
