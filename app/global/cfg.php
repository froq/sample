<?php
/**
 * Create your configs here that will be used globally in app.
 */

// keep globals clean..
return (function() {
    $cfg = [];

    // aliases
    // $cfg['service']['aliases']['foo'] = ['<REAL_SERVICE_NAME>', 'methods' => ['bar' => '<REAL_SERVICE_METHOD_NAME>']];
    // aliases with regexp
    // $cfg['service']['aliases']['~~'][] = ['<REAL_SERVICE_NAME>', 'method' => '<REAL_SERVICE_METHOD_NAME>', 'pattern' => '~^/[\w-]+/(\d+)$~i'];

    // session save handler
    // $cfg['session']['saveHandler'] = '\My\Session\SaveHandler'; // or
    // $cfg['session']['saveHandler'] = ['\My\Session\SaveHandler', '/my/session/save-handler.php'];

    // logger
    // $cfg['logger']['level'] = froq\logger\Logger::ALL;

    return $cfg;
})();
