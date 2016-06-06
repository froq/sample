<?php
/**
 * Set your config here that will be used globally in app.
 */
$cfg = [];

// logger
$cfg['app.logger']['level'] = Froq\Logger\Logger::FAIL | Froq\Logger\Logger::WARN;

return $cfg;
