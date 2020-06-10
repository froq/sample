<?php
// As current user.
// ~$ php -S localhost:8080 -t pub/ bin/server.php

// As another user (i.e. www-data).
// ~$ sudo -u www-data php -S localhost:8080 -t pub/ bin/server.php

if (PHP_SAPI != 'cli-server') {
    die('This file must be run via cli-server only.');
}

// Set env as local.
define('__local__', true);

$_pub = realpath(__dir__ . '/../pub');

// Check for static files.
$_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (file_exists($_pub . $_uri)) {
    return false;
}

// Forward all to index.php.
require $_pub . '/index.php';
