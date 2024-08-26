<?php
/**
 * Generate routes by parsing controller action attributes.
 * @see IndexController::testAttribAction()
 */
return froq\Router::parseRoutes(
    // With attributes.
    directory: __DIR__ . '/../system',
    source: 'attributes',
    cache: true,

    // With custom directory.
    // directory: __DIR__ . '/../system/controller',
);
