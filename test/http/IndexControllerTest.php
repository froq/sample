<?php declare(strict_types=1);

namespace test\http;

use froq\http\response\Status;

class IndexControllerTest extends \HttpTestCase
{
    function test_index_with_okay_status() {
        $response = $this->request('GET', '/');
        $payload = $response->getBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame('Hello', strcut($payload, 5));
    }

    function test_error_with_okay_status() {
        $response = $this->request('GET', '/error');
        $payload = $response->getBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame('Error', strcut($payload, 5));
    }

    function test_for_annotated_route() {
        $response = $this->request('GET', '/test-annot');

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame('Replied for annotated method!', strip($response->getBody()));
    }

    function test_for_attributed_route() {
        $response = $this->request('GET', '/test-attrib');

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame('Replied for attributed method!', strip($response->getBody()));
    }
}
