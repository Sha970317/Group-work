<?php
// Prevent redefinition of constants
if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', ''); // Ensure empty password is handled correctly
if (!defined('DB_NAME')) define('DB_NAME', 'Registration');

// Optional: Other Configurations
if (!defined('SITE_URL')) define('SITE_URL', 'http://yourwebsite.com');
if (!defined('UPLOAD_DIR')) define('UPLOAD_DIR', __DIR__ . '/uploads');

// Ensure the uploads directory exists
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0777, true);
}
?>

