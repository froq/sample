<?php declare(strict_types=1);

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

// Requried for local environments.
if (file_exists(__DIR__ . '/../vendor/froq/froq/src/Autoloader.php')) {
    require_once __DIR__ . '/../vendor/froq/froq/src/Autoloader.php';
    $loader = froq\Autoloader::init(__DIR__ . '/../vendor/froq');
    $loader->register() && $loader->loadSugars();
    unset($loader);
}

// Drop sample.db file.
if (file_exists(__DIR__ . '/../var/sample.db')) {
    unlink(__DIR__ . '/../var/sample.db');
}

define('APP_DIR', dirname(__DIR__));
date_default_timezone_set('UTC');

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Group;
use froq\http\client\{Client, Response};

/**
 * Base test case for Unit tests.
 */
#[Group('Unit')]
abstract class UnitTestCase extends TestCase {
    // Add some extensions if needed.
}

/**
 * Base test case for HTTP (controller) tests.
 */
#[Group('Http')]
abstract class HttpTestCase extends TestCase {
    /**
     * Send a request, receive a response.
     * Note: Local server must be run before all tests.
     */
    function request(
        string $method, string $path,
        ?array $body = null, ?array $headers = null
    ): Response {
        $client = new Client(
            url: 'http://localhost:8080/' . trim($path, '/'),
            options: ['json' => true, 'gzip' => false]
        );

        return $client->send($method, body: $body, headers: $headers);
    }
}
