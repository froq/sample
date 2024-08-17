<?php
/**
 * Define your services here.
 */
return [
    /* It's recommended to use the way below for constructor & method injections. */
    /* So use full class names if you're going to inject these classes into calls. */

    // See IndexController::index() for details
    app\service\HelloInterface::class => [
        // Index 0 is service class.
        app\service\Hello::class,
        // Index 1 is service class arguments for constructor.
        ['name' => 'World'],
        // Index 2 is service class init options (@default=true).
        ['once' => true or false]
    ],

    // Or with class name.
    // app\service\Hello::class => [
    //     // Index 0 is service class.
    //     app\service\Hello::class,
    //     // Index 1 is service class arguments for constructor.
    //     ['name' => 'World'],
    //     // Index 2 is service class init options (@default=true).
    //     ['once' => true or false]
    // ],

    // Other ways.
    // 'hello' => ['app\service\Hello'],
    // 'hello' => ['app\service\Hello', 'World'],
    // 'hello' => ['app\service\Hello', 'World', false],
    // 'hello' => ['app\service\Hello', 'World', ['once' => false]],
    // 'hello' => ['app\service\Hello', [], false],
    // 'hello' => ['app\service\Hello', null, false],
    // or
    // 'hello' => static function ($name = 'World') {
    //     return new app\service\Hello($name);
    // },
    // or
    // 'hello' => static function ($name = 'World') {
    //     return 'Hello, '. $name .'!';
    // },
];
