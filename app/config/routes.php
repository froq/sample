<?php
/**
 * Define your routes here.
 */

return [
    ['/', 'Index'],
    ['/error', 'Index.error'],

    ['/favicon.ico', ['GET' => 'Index.favicon']],
];
