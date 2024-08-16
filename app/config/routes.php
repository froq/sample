<?php
/**
 * Define your routes here.
 */
return [
    // Note: Controller & Action suffixes are not needed.
    // So "Index.favicon" => "system/Index/IndexController::faviconAction()".

    // Index route.
    '/' => 'Index',

    // Error route.
    '/error' => 'Index.error',

    // Book routes (RESTful way), option 1.
    '/book' => [
        // Respond only GET,POST methods.
        'GET'  => 'Book.list',
        'POST' => 'Book.add',
    ],
    '/book/:id' => [
        // Respond only GET,PUT,DELETE methods.
        'GET'    => 'Book.show',
        'PUT'    => 'Book.edit',
        'DELETE' => 'Book.delete',
    ]

    // // Book routes (RESTful way), option 2.
    // ['/book'    , ['GET'    => 'Book.list']],
    // ['/book'    , ['POST'   => 'Book.add']],
    // ['/book/:id', ['PUT'    => 'Book.edit']],
    // ['/book/:id', ['GET'    => 'Book.show']],
    // ['/book/:id', ['DELETE' => 'Book.delete']],

    // More..
    // '/user/:id' => ['GET' => 'User.show'],
    // '/user/:id' => ['GET' => function ($id) { ... }],
    // '/user/:id' => ['GET,POST' => function ($id) { ... }],
];
