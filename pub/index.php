<?php
// Define app dir & start time.
define('APP_DIR', dirname(__dir__));
define('APP_START_TIME', microtime(true));

// Include composer autoload.
if (!is_file(APP_DIR . '/vendor/autoload.php')) {
    die('Composer autoload file not found!');
}
require APP_DIR . '/vendor/autoload.php';

// Include autoloader file.
if (!is_file($file = (APP_DIR . '/vendor/froq/froq/src/Autoloader.php'))) {
    die('Froq autoloader file "' . $file . '" not found!');
}
require $file;

// Register autoloader.
$autoloader = froq\Autoloader::init();
$autoloader->register();

// Include initial file that returns App object.
if (!is_file($file = (APP_DIR . '/vendor/froq/froq/src/_init.php'))) {
    die('Froq init file "' . $file . '" not found!');
}

/**
 * App object.
 * @var froq\App
 */
$app = require $file;

/**
 * App environment.
 * @var string
 */
$app_env = __local__ ? froq\Env::DEVELOPMENT : froq\Env::PRODUCTION;

/**
 * App root (for API versioning or such works eg: /v1 => api.foo.com/v1).
 * @var string
 */
$app_root = '/';

/**
 * App configurations (those environmental when environment-related file exists).
 * @var array
 */
$app_configs = is_file(APP_DIR . '/app/config/config-' . $app_env . '.php')
    ? require APP_DIR . '/app/config/config-' . $app_env . '.php'
    : require APP_DIR . '/app/config/config.php';

// Error handler.
// $app->on('error', function ($event, $error) { ... });

// Output handler.
// $app->on('output', function ($event, $output) { ... });

// Before/after handlers.
// $app->on('before', function ($event) { ... });
// $app->on('after', function ($event) { ... });

// Shortcut routes.
// $app->get('/book/:id', 'Book.show');
// $app->get('/book/:id', function ($id) { ... });

// Run app.
try {
    $app->run(['env' => $app_env, 'root' => $app_root, 'configs' => $app_configs]);
} catch (Throwable $e) {
    $app->rerun($e);
}
