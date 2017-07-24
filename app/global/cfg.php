<?php
/**
 * Set your config here that will be used globally in app.
 */

// keep globals clean..
return (function() {
    $cfg = [];

    // logger
    $cfg['app.logger']['level'] = Froq\Logger\Logger::FAIL | Froq\Logger\Logger::WARN;

    return $cfg;
})();
