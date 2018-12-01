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
ob_start();

/**
 * App dir.
 * @const string
 */
define('APP_DIR', dirname(__dir__));

/**
 * App start time.
 * @const float
 */
define('APP_START_TIME', microtime(true));

/**
 * Set everything as relative to the app dir.
 * @important
 */
chdir(APP_DIR);

/**
 * Fix request scheme.
 * @important
 */
if (!isset($_SERVER['REQUEST_SCHEME'])) {
    $_SERVER['REQUEST_SCHEME'] = 'http'. (($_SERVER['SERVER_PORT'] == '443') ? 's' : '');
}

/**
 * Include composer autoload.
 */
if (!is_file('./vendor/autoload.php')) {
    die('Composer autoloader not found!');
}
require('./vendor/autoload.php');

/**
 * Include bootstrap that registers Autoload and returns app.
 * @var Froq\App
 */
if (!is_file('./vendor/froq/froq/src/boot.php')) {
    die('Froq bootstrap not found!');
}
$app = require('./vendor/froq/froq/src/boot.php');

/**
 * App env.
 * @var string
 */
$appEnv = Froq\App::ENV_PRODUCTION;
if (is_local()) {
    $appEnv = Froq\App::ENV_DEV;
}

/**
 * App root.
 * @var string
 */
$appRoot = '/';

/**
 * User app config.
 * @var array
 */
$appConfig = require('./app/global/cfg.php');

/**
 * Set output handler or others.
 */
// output handler
// $app->events()->on('app.output', function($output) {
//    return $output;
// });

// before/after called service method
// $app->events()->on('service.beforeRun', func, [, funcArgs]);
// $app->events()->on('service.afterRun', func, [, funcArgs]);

/**
 * Set app env/root/config and run app.
 */
$app->run([
    'env' => $appEnv,
    'root' => $appRoot,
    'config' => $appConfig
]);
