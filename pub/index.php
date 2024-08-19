<?php declare(strict_types=1);
/**
 * Define app constants.
 */
define('APP_DIR', dirname(__DIR__));
define('APP_START', microtime(true));

/**
 * Require Froq!
 */
require __DIR__ . '/Froq.php';

try {
    /**
     * Initialize.
     * @see Froq.php file.
     */
    Froq::init(
        root: null, env: null, dir: null,
        // options: [
        //     'dotenv' => [
        //         'file' => string, // A static file with full path.
        //         'cache' => bool,  // Cache parse result (@default=true).
        //         'global' => bool, // Set result in $_ENV (@default=false).
        //     ]
        // ]
    )

    /**
     * Prepare.
     */
    // ->prepare(function ($app) {
    //     // Error handler.
    //     $app->on('error', function ($event, $error) { ... });

    //     // Output handler.
    //     $app->on('output', function ($event, $output) { ... return $output });

    //     // Before/after handlers.
    //     $app->on('before', function ($event) { ... });
    //     $app->on('after', function ($event) { ... });

    //     // Shortcut routes.
    //     $app->get('/book/:id', 'Book.show');
    //     $app->get('/book/:id', function ($id) { ... });
    // })

    /**
     * Run.
     */
    ->run();
} catch (Throwable $e) {
    Froq::error($e);
}
