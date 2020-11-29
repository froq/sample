<?php
/**
 * Copyright (c) 2015 · Kerem Güneş
 * Apache License 2.0 <https://opensource.org/licenses/apache-2.0>
 */

// Define app dir & start time.
define('APP_DIR', dirname(__dir__));
define('APP_START_TIME', microtime(true));

// Include composer autoload.
if (!is_file(APP_DIR .'/vendor/autoload.php')) {
    die('Composer autoload file not found!');
}
require APP_DIR .'/vendor/autoload.php';

/**
 * Wrapper.
 * @private
 */
(function () {
    // Include autoloader file and registers Autoloader.
    if (!is_file($file = (APP_DIR .'/vendor/froq/froq/src/Autoloader.php'))) {
        die('Froq autoloader file "'. $file .'" not found!');
    }

    require $file;

    // Register autoloader.
    $autoloader = froq\Autoloader::init();
    $autoloader->register();

    // Include initial file that returns App.
    if (!is_file($file = (APP_DIR .'/vendor/froq/froq/src/init.php'))) {
        die('Froq init file "'. $file .'" not found!');
    }

    /**
     * App.
     * @var froq\App
     */
    $app = require $file;

    /**
     * App env.
     * @var string
     */
    $appEnv = froq\Env::PRODUCTION;
    if (__local__) {
        $appEnv = froq\Env::DEV;
    }

    /**
     * App root.
     * @var string
     */
    $appRoot = '/';

    /**
     * App configs.
     * @var array
     */
    $appConfigs = is_file(APP_DIR .'/app/config/config-'. $appEnv .'.php')
        ? require APP_DIR .'/app/config/config-'. $appEnv .'.php'
        : require APP_DIR .'/app/config/config.php';

    // Error handler.
    // $app->events()->on('app.error', function ($error) { .. });

    // Output handler.
    // $app->events()->on('app.output', function ($output) { .. });

    // Before/after handlers.
    // $app->events()->on('app.before', function () { .. });
    // $app->events()->on('app.after', function () { .. });

    // Shortcut routes.
    // $app->get('/book/:id', 'Book.show');
    // $app->get('/book/:id', function () { .. });


    // Run app.
    try {
        $app->run(['env' => $appEnv, 'root' => $appRoot, 'configs' => $appConfigs]);
    } catch (Throwable $error) {

        // This will be sent to shutdown.
        if (__local__) {
            throw $error;
        }

        $app->error($error);
    }
})();
