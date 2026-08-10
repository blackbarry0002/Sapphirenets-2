<?php
/**
 * Sapphire Internet PHP Site Configuration
 * Common functions and settings
 */

// Site configuration
define('SITE_URL', 'http://localhost/sapphire-new-web-php');
define('SITE_NAME', 'Sapphire Internet');
define('PHONE', '+18886202103');

/**
 * Get the current page name
 */
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF']);
}

/**
 * Check if current page is active
 */
function isActive($page) {
    return getCurrentPage() === $page ? 'active' : '';
}

/**
 * Format phone number
 */
function formatPhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) === 11) {
        return '(' . substr($phone, 1, 3) . ') ' . substr($phone, 4, 3) . '-' . substr($phone, 7);
    }
    return $phone;
}
?>
