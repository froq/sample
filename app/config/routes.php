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

    // Book routes (RESTful way).
    ['/book'    , ['*'      => 'Book.list']],
    ['/book'    , ['POST'   => 'Book.add']],
    ['/book/:id', ['PUT'    => 'Book.edit']],
    ['/book/:id', ['GET'    => 'Book.show']],
    ['/book/:id', ['DELETE' => 'Book.delete']],

    // Favicon route.
    '/favicon\.ico' => ['GET' => 'Index.favicon'],

    // More..
    // '/user/:id' => ['GET' => 'User.show'],
    // '/user/:id' => ['GET' => function ($id) { ... }],
];
