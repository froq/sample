<?php
/**
 * Create your configs here that will be used globally in app.
 */

// keep globals clean..
return (function() {
    $cfg = [];

    // aliases
    // $cfg['app.service.aliases']['foo'] = ['<REAL_SERVICE_NAME>', 'methods' => ['bar' => '<REAL_SERVICE_METHOD_NAME>']];
    // regexp aliases
    // $cfg['app.service.aliases']['@@@'][] = ['<REAL_SERVICE_NAME>', 'method' => '<REAL_SERVICE_METHOD_NAME>', 'pattern' => '~^/[\w-]+/(\d+)$~i'];

    // session handler
    // $cfg['app.session.cookie']['handler'] = '\My\Session\Handler'; // or
    // $cfg['app.session.cookie']['handler'] = ['\My\Session\Handler', '/my/session/handler.php'];

    // logger
    $cfg['app.logger']['level'] = Froq\Logger\Logger::FAIL | Froq\Logger\Logger::WARN;

    return $cfg;
})();
