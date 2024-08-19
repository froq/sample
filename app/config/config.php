<?php
/**
 * Define your configs here (env=development).
 */
return [
    /* Note: dot (.) notations are valid for base keys, both valid and same below. */
    /* 'response.json' => ['flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE] */
    /* 'response' => ['json' => ['flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE]] */

    /**
     * App stuff (as in .env configs).
     */
    // 'url' => env('APP_URL'),
    // 'host' => env('APP_HOST'),
    // 'port' => env('APP_PORT'),

    /**
     * Localization.
     */
    'locales' => [LC_TIME => 'en_US.UTF-8'],
    'timezone' => 'UTC', 'language' => 'en', 'encoding' => 'UTF-8',

    /**
     * INI Configuration.
     */
    // 'ini' => [name => value (scalar)],

    /**
     * Permanent response cookies.
     */
    // 'cookies' => [name => [value, ?[options]]],

    /**
     * Permanent response headers (null = remove).
     */
    'headers' => [
        // Cache (https://stackoverflow.com/questions/49547/how-do-we-control-web-page-caching-across-all-browsers).
        'Cache-Control' => 'no-cache, no-store, must-revalidate, max-age=0, pre-check=0, post-check=0',
        'Pragma' => 'no-cache',
        'Expires' => '0',
        'X-Powered-By' => 'Froq!',
        // Security (https://www.owasp.org/index.php/List_of_useful_HTTP_headers).
        'X-Content-Type-Options' => 'nosniff',
        'X-Frame-Options' => 'sameorigin',
        'X-XSS-Protection' => '1; mode=block',
    ],

    /**
     * Response options.
     */
    // 'response.compress'       => ['gzip' or 'zlib', 'minlen' => 64 (in kb) 'level' => 1..9],
    // 'response.xml'            => ['indent' => bool, 'indentString' => ' '],
    // 'response.json'           => ['indent' => string|int, 'flags' => JSON_*],
    // 'response.file.rateLimit' => 1024 ** 2, // 1MB

    // As this is a sample, we want to see indented JSON strings.
    'response.json' => ['indent' => 2],

    /**
     * Logger options with defaults.
     */
    // 'logger' => [
    //     'level' => froq\log\LogLevel::ALL,
    //     'directory' => APP_DIR . '/var/log',
    // ],

    /**
     * Session options (true = activate with default options).
     */
    // 'session'  => true,
    /**
     * With custom options (@see froq\session\SessionOptions).
     */
    // 'session'  => [
    //     'name'     => 'SID',
    //     'hash'     => 'uuid' or 32, 40, 16, 'hashUpper' => bool,
    //     'savePath' => null, 'saveHandler' => class or [class, class-file],
    //     'cookie'   => [
    //         'lifetime' => 0,    'path'     => '/',  'domain'   => '',
    //         'secure'   => bool, 'httponly' => bool, 'samesite' => '',
    //     ],
    // ],

    /**
     * Database options (@see froq\database\{Database, Link}).
     */
    // 'database' => [
    //     'dsn'  => string,
    //     'user' => string,
    //     'pass' => string,
    //     'profiling' => bool,
    //     'logging' => array, // @see 'logger' options
    // ],

    // As this is a sample, we want to work with SQLite database.
    // 'database' => ['dsn' => 'sqlite:' . APP_DIR . '/var/sample.db'],
    'database' => ['dsn' => env('DATABASE_URL')],

    /**
     * Cache options.
     */
    // 'cache' => [
    //     'id' => string,
    //     'options' => [
    //         'id' => ?string,
    //         'agent' => 'file', 'apcu', 'redis' or 'memcached',
    //         'static' => bool, // default=true
    //         'ttl' => int, // default=60 (1 min)
    //         'host' = int, // For Redis & Memcached
    //         'port' = int, // For Redis & Memcached
    //     ]
    // ],

    /**
     * Router options (@see froq\Router).
     */
    // 'router' => [
    //     'defaultController' => class, 'defaultAction' => method,
    //     'unicode' => bool, 'icase' => bool, 'throwErrors' => bool,
    //     'decodeUri' => bool, 'endingSlashes' => bool,
    // ],

    /**
     * View options.
     */
    // 'view' => [
    //     'base' => string, // Eg: APP_DIR . '/app/views'
    //     'layout' => string // Eg: APP_DIR . '/app/views/layaout.php'
    // ],

    /**
     * Expose app runtime.
     * true=all, false=none, 'development', 'testing', 'staging', 'production'
     */
    'exposeAppRuntime' => true,

    /**
     * Misc options, add more by your needs.
     */
    // 'key' => 'value' or env('VALUE'),

    /**
     * Routes & services.
     * !!! DO NOT EDIT !!!
     */
    'routes' => require __DIR__ . '/routes.php',
    'services' => require __DIR__ . '/services.php',
];
