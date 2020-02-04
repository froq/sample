<?php
// as current user
// ~$ php -S localhost:8080 bin/server.php

// as another user (i.e. www-data)
// ~$ sudo -u www-data php -S localhost:8080 bin/server.php

// set env as local
define('local', true);

// forward all to index.php
require __dir__ .'/../pub/index.php';
