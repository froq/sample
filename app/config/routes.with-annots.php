<?php
/**
 * Generate routes by parsing controller action annotations.
 * @see IndexController::testAnnotAction()
 */
return froq\Router::parseRoutes(
    // With annotations.
    directory: __DIR__ . '/../system',
    source: 'annotations',
    cache: true,

    // With custom directory.
    // directory: __DIR__ . '/../system/controller',
);
