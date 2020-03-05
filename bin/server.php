<?php
// As current user.
// ~$ php -S localhost:8080 bin/server.php

// As another user (i.e. www-data).
// ~$ sudo -u www-data php -S localhost:8080 bin/server.php

// Set env as local.
define('__local__', true);

// Forward all to index.php.
require __dir__ .'/../pub/index.php';
