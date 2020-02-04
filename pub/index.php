<?php
/**
 * MIT License <https://opensource.org/licenses/mit>
 *
 * Copyright (c) 2015 Kerem Güneş
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
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
(function() {
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
    if (local) {
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
    $appConfigs = is_file('./app/config/config-'. $appEnv .'.php')
        ? require './app/config/config-'. $appEnv .'.php'
        : require './app/config/config.php';

    // Error handler.
    // $app->events()->on('app.error', function ($error) { .. });

    // Output handler.
    // $app->events()->on('app.output', function($output) { .. });

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
        if (local) {
            throw $error;
        }

        $app->error($error);
    }
})();
