<?php
/**
 * Copyright (c) 2016 Kerem Güneş
 *    <k-gun@mail.com>
 *
 * GNU General Public License v3.0
 *    <http://www.gnu.org/licenses/gpl-3.0.txt>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
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
 * Include composer autoload.
 */
if (!file_exists('./vendor/autoload.php')) {
    die('Composer autoloader not found!');
}
require('./vendor/autoload.php');

/**
 * Include bootstrap that registers Autoload
 * and returns app.
 * @var Froq\App
 */
if (!file_exists('./vendor/froq/froq/src/boot.php')) {
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
// $app->events->on('app.output', function($output) {
//    ...;
// });

// before/after called service method
// $this->app->events->on('service.beforeRun', func, [, funcArgs]);
// $this->app->events->on('service.afterRun', func, [, funcArgs]);

/**
 * Set app env/root/config and run app.
 */
$app->setEnv($appEnv)
    ->setRoot($appRoot)
    ->setConfig($appConfig)
    ->run();

