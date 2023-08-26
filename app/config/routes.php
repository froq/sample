<?php
/**
 * Define your routes here.
 */
return [
    // Note: Controller & Action suffixes are not needed.
    // So "Index.favicon" => "system/Index/IndexController::faviconAction()".

    '/' => 'Index',
    '/error' => 'Index.error',

    '/favicon\.ico' => ['GET' => 'Index.favicon'],

    // More..
    // '/user/:id' => ['GET' => 'User.show'],
    // '/user/:id' => ['GET' => function ($id) { ... }],
];
