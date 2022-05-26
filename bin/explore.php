<?php
// Generates an autoload map for app/system & app/library folders.
// $ php -f bin/explore.php -- OR $ composer explore
// $ php -f bin/explore.php -- --no-sort OR $ composer explore -- --no-sort

// @tome: ln -s /var/www/\!froq/froq* /var/www/\!froq/sample_test/vendor/froq

if (PHP_SAPI != 'cli') {
    die('This file must be run via cli only!');
}

// Path to "vendor/froq" folder.
const __froqDir = __dir__ . '/../vendor/froq';

// Include autoloader file.
if (!is_file($file = (__froqDir . '/froq/src/Autoloader.php'))) {
    die('Froq autoloader file "' . $file . '" not found!');
}
require $file;

// Register autoloader.
$loader = froq\Autoloader::init(__froqDir);
$loader->register();

// Default options.
$options = ['sort' => true, 'drop' => false];

// Argument options.
$arguments = getopt('', ['no-sort', 'drop']);
if (isset($arguments['no-sort'])) {
    $options['sort'] = false;
}
if (isset($arguments['drop'])) {
    $options['drop'] = true;
}

// Required for autoloader.
define('APP_DIR', dirname(__dir__));

// Drop autoload map.
if ($options['drop']) {
    $mapFile = APP_DIR . $loader->getMapFile();
    if (!is_file($mapFile)) {
        echo 'No file exists such: "' . $mapFile .'", skipped.';
        echo PHP_EOL;
    } else {
        echo 'Dropping autoload map: "' . $mapFile . '" ... ';
        $loader->explore('', $options);
        echo 'OK!';
        echo PHP_EOL;
    }
    return;
}

// Explore system & library folders.
foreach (['/app/system', '/app/library'] as $directory) {
    echo 'Generating autoload map for: "' . APP_DIR . $directory . '" ... ';
    $loader->explore($directory, $options);
    echo 'OK!';
    echo PHP_EOL;
}
