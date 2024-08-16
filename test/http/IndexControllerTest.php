<?php declare(strict_types=1);

namespace test\http;

use froq\http\response\Status;

class IndexControllerTest extends \HttpTestCase
{
    function test_index() {
        $response = $this->request('GET', '/');
        $payload = $response->getBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame('Hello', strcut($payload, 5));
    }

    function test_error() {
        $response = $this->request('GET', '/error');
        $payload = $response->getBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame('Error', strcut($payload, 5));
    }
}
