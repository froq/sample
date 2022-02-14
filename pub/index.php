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

// Include initial file that returns App.
if (!is_file($file = (APP_DIR . '/vendor/froq/froq/src/_init.php'))) {
    die('Froq init file "' . $file . '" not found!');
}

/**
 * App object, comes from required file.
 * @var froq\App
 */
$app = require $file;

/**
 * App environment.
 * @var string
 */
$app_env = __local__ ? froq\Env::DEVELOPMENT : froq\Env::PRODUCTION;

/**
 * App root, that used for API versioning or such works (eg: /v1 => api.foo.com/v1).
 * @var string
 */
$app_root = '/';

/**
 * App configs, those environmental when environment-related file exists.
 * @var array
 */
$app_configs = is_file(APP_DIR . '/app/config/config-' . $app_env . '.php')
    ? require APP_DIR . '/app/config/config-' . $app_env . '.php'
    : require APP_DIR . '/app/config/config.php';

// Error handler.
// $app->on('app.error', function ($app, $error) { ... });

// Output handler.
// $app->on('app.output', function ($app, $output) { ... });

// Before/after handlers.
// $app->on('app.before', function ($app) { ... });
// $app->on('app.after', function ($app) { ... });

// Shortcut routes.
// $app->get('/book/:id', 'Book.show');
// $app->get('/book/:id', function () { ... });


// Run app.
try {
    $app->run(['env' => $app_env, 'root' => $app_root, 'configs' => $app_configs]);
} catch (Throwable $error) {
    // This will be sent to shutdown.
    if (__local__) {
        throw $error;
    }
    $app->error($error);
}
