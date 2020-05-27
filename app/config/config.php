<?php
/**
 * Define your configs here.
 */

return [
    // Note: dot (.) notations are valid.
    // With dots.
    // 'response.json.flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
    // 'response.json' => ['flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE],
    // Without dots.
    // 'response' => ['json' => ['flags' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE]],

    // Routes & services.
    'routes'   => include 'routes.php',
    'services' => include 'services.php',

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
        'Expires'                => 'Thu, 19 Nov 1981 08:10:00 GMT',
        'Cache-Control'          => 'no-cache, no-store, must-revalidate, max-age=0, pre-check=0, post-check=0',
        'Pragma'                 => 'no-cache',
        'Connection'             => 'close',
        'X-Powered-By'           => 'Froq!',
        // Security (@see https://www.owasp.org/index.php/List_of_useful_HTTP_headers).
        'X-Frame-Options'        => 'SAMEORIGIN',
        'X-XSS-Protection'       => '1; mode=block',
        'X-Content-Type-Options' => 'nosniff',
    ],

    // Initial response cookies.
    // 'cookies'  => [name => [value, ?[options]]],

    // Logger options.
    // 'logger' => [
    //     'level'     => froq\logger\Logger::ERROR | froq\logger\Logger::WARN,
    //     'directory' => APP_DIR .'/tmp/log',
    // ],

    // Session options ([] = use default options).
    'session'  => [],
    // With custom options.
    // 'session'  => [
    //     'name'        => 'SID',
    //     'hash'        => true, 'hashLength'  => 40, // ID length, 32 or 40 only.
    //     'savePath'    => null, 'saveHandler' => null,
    //     'cookie'      => [
    //         'lifetime' => 0,     'path'     => '/',   'domain'   => '',
    //         'secure'   => false, 'httponly' => false, 'samesite' => '', // PHP/7.3.
    //     ],
    // ],

    // Response options.
    // 'response.gzip'           => true,
    // 'response.xml'            => ['indent' => true, 'indentString' => ' '],
    // 'response.image'          => ['jpegQuality' => 75, 'webpQuality' => 75],
    // 'response.json.flags'     => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
    // 'response.file.rateLimit' => 1024 ** 2, // 1024KB

    // Database options.
    // 'database'    => [
    //     'dsn'  => '...',
    //     'user' => '', 'pass' => '', 'profile' => true or false,
    // ],

    // Route options.
    // 'route' => ['unicode' => true, 'decodeUri' => true, 'endingSlashes' => false],

    // View options.
    // 'view.layout' => APP_DIR .'/app/global/layout.php',

    // Misc options.
    'exposeAppRuntime' => true, // true=all, false=none or 'dev','test','stage','production'
];
