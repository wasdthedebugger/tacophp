<?php
session_start(); // Start the session
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1); // Show errors for debugging (disable in production)

// Define available pages (prevents directory traversal attacks)
$pages = ['home', 'about', 'contact', 'login', 'logout', 'register']; // Add all valid page names here

// Safely retrieve 'page' parameter from URL, default to 'home'
$page = filter_input(INPUT_GET, 'page', FILTER_DEFAULT) ?: 'home';

// Ensure that the page is valid
if (!in_array($page, $pages)) {
    $page = 'home'; // Fallback to 'home' if the page is not valid
}

// Handle additional parameters like 'name' securely (using htmlspecialchars)
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8') : ''; // Sanitize 'name' parameter

// Define the path to the page file
require_once 'includes/header.php'; // Include header (common to all pages)
$pagePath = "pages/{$page}.php";

// Check if the page exists and include it, otherwise show a 404 error
if (file_exists($pagePath)) {
    include($pagePath);
} else {
    include("404.php");
}

require_once 'includes/footer.php'; // Include footer (common to all pages)
?>
