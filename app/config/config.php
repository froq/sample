<?php
/**
 * Define your configs here.
 */

return [
    // Note: dot (.) notations are valid for base keys.
    // With/without dots.
    // 'response' => ['json' => ['flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE]]
    // 'response.json' => ['flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE]

    // Routes & services.
    'routes'   => include 'routes.php',
    // 'services' => include 'services.php',

    // Protocols.
    'http'     => 'http://'. $_SERVER['SERVER_NAME'],
    'https'    => 'https://'. $_SERVER['SERVER_NAME'],

    // Localization.
    'timezone' => 'UTC',
    'language' => 'en',
    'encoding' => 'UTF-8',
    'locales'  => [LC_TIME => 'en_US.UTF-8'],

    // Initial response headers (null means remove).
    'headers'  => [
        // Cache (https://stackoverflow.com/questions/49547/how-do-we-control-web-page-caching-across-all-browsers).
        'Cache-Control'          => 'no-cache, no-store, must-revalidate, max-age=0, pre-check=0, post-check=0',
        'Pragma'                 => 'no-cache',
        'Expires'                => '0',
        // 'Connection'             => 'close',
        'X-Powered-By'           => 'Froq!',
        // Security (https://www.owasp.org/index.php/List_of_useful_HTTP_headers).
        'X-Content-Type-Options' => 'nosniff',
        'X-Frame-Options'        => 'sameorigin',
        'X-XSS-Protection'       => '1; mode=block',
    ],

    // Initial response cookies.
    // 'cookies'  => [name => [value, ?[options]]],

    // Logger options.
    // 'logger' => [
    //     'level'     => froq\logger\Logger::ERROR | froq\logger\Logger::WARN,
    //     'directory' => APP_DIR .'/var/log',
    // ],

    // Session options ([] = use default options).
    // 'session'  => [],
    // With custom options (below is default).
    // 'session'  => [
    //     'name'        => 'SID',
    //     'hash'        => bool, 'hashLength'  => 40, // ID length: 16, 32 or 40 only.
    //     'savePath'    => null, 'saveHandler' => null,
    //     'cookie'      => [
    //         'lifetime' => 0,     'path'     => '/',   'domain'   => '',
    //         'secure'   => bool,  'httponly' => bool,  'samesite' => '',
    //     ],
    // ],

    // Response options.
    // 'response.gzip'           => bool or ['minlen' => 64 (in kb) ...],
    // 'response.xml'            => ['indent' => bool, 'indentString' => ' '],
    // 'response.json'           => ['flags' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES],
    // 'response.image'          => ['jpegQuality' => 75, 'webpQuality' => 75],
    // 'response.file.rateLimit' => 1024 ** 2, // 1MB

    // Database options.
    // 'database'    => [
    //     'dsn'  => '...',
    //     'user' => '', 'pass' => '', 'profile' => bool,
    // ],

    // Cache options.
    // 'cache' => ['id' => string, 'agent' => ['id' => string, 'name' => string, 'static' => bool,
        // 'options' => ['ttl' => int, ...]]],

    // Router options.
    // 'router' => ['defaultController' => string, 'defaultAction' => string,
    //              'unicode' => bool, 'decodeUri' => bool, 'endingSlashes' => bool],

    // Dotenv.
    // 'dotenv' => ['file' => string, 'global' => bool],

    // View options.
    // 'view' => ['base' => string, 'layout' => string],

    // Misc options.
    'exposeAppRuntime' => true, // true=all, false=none or 'dev','test','stage','production'
];
