<?php declare(strict_types=1);
namespace test\http;

use froq\http\response\Status;

class BookControllerTest extends \HttpTestCase
{
    function test_list_books_with_not_found_status() {
        $response = $this->request('GET', '/book');
        $payload = $response->getParsedBody();

        // Since we drop sample.db file in boot.
        self::assertSame(Status::NOT_FOUND, $response->getStatus());
        self::assertSame(Status::NOT_FOUND, $payload['status']);

        self::assertSame(0, $payload['meta']['total']);
        self::assertSame([], $payload['data']);
    }

    function test_list_books_with_okay_status() {
        // Add a new book so we can receive an okay status.
        $book = ['name' => 'Test 1', 'author' => 'Test 1'];
        $this->request('POST', '/book', $book);

        $response = $this->request('GET', '/book');
        $payload = $response->getParsedBody();

        // Since we drop sample.db file in boot.
        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame(Status::OKAY, $payload['status']);

        self::assertSame(1, $payload['meta']['total']);
        self::assertSame($book['name'], $payload['data'][0]['name']);
        self::assertSame($book['author'], $payload['data'][0]['author']);
    }

    function test_add_book_with_bad_request_status() {
        $book = ['name' => '', 'author' => ''];
        $response = $this->request('POST', '/book', $book);
        $payload = $response->getParsedBody();

        self::assertSame(Status::BAD_REQUEST, $response->getStatus());
        self::assertSame(Status::BAD_REQUEST, $payload['status']);

        self::assertIsString($payload['error']);
        self::assertNull($payload['data']);
    }

    function test_add_book_with_okay_status() {
        $book = ['name' => 'Test 2', 'author' => 'Test 2'];
        $response = $this->request('POST', '/book', $book);
        $payload = $response->getParsedBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame(Status::OKAY, $payload['status']);

        self::assertSame($book['name'], $payload['data']['name']);
        self::assertSame($book['author'], $payload['data']['author']);

        self::assertIsInt($payload['data']['id']);
        self::assertIsString($payload['data']['createdAt']);
        self::assertNull($payload['data']['updatedAt']);
    }

    function test_edit_book_with_bad_request_status() {
        $book = ['name' => '', 'author' => ''];
        $response = $this->request('PUT', '/book/2', $book);
        $payload = $response->getParsedBody();

        self::assertSame(Status::BAD_REQUEST, $response->getStatus());
        self::assertSame(Status::BAD_REQUEST, $payload['status']);

        self::assertIsString($payload['error']);
        self::assertNull($payload['data']);
    }

    function test_edit_book_with_not_found_status() {
        $book = ['name' => 'Test 3', 'author' => 'Test 3'];
        $response = $this->request('PUT', '/book/3', $book);
        $payload = $response->getParsedBody();

        self::assertSame(Status::NOT_FOUND, $response->getStatus());
        self::assertSame(Status::NOT_FOUND, $payload['status']);

        self::assertNull($payload['error']);
        self::assertNull($payload['data']);
    }

    function test_edit_book_with_okay_status() {
        $book = ['name' => 'Test 2', 'author' => 'Test 2'];
        $response = $this->request('PUT', '/book/2', $book);
        $payload = $response->getParsedBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame(Status::OKAY, $payload['status']);

        self::assertSame($book['name'], $payload['data']['name']);
        self::assertSame($book['author'], $payload['data']['author']);

        self::assertIsInt($payload['data']['id']);
        self::assertIsString($payload['data']['createdAt']);
        self::assertNotNull($payload['data']['updatedAt']);
    }

    function test_delete_book_with_not_found_status() {
        $response = $this->request('DELETE', '/book/3');
        $payload = $response->getParsedBody();

        self::assertSame(Status::NOT_FOUND, $response->getStatus());
        self::assertSame(Status::NOT_FOUND, $payload['status']);

        self::assertNull($payload['error']);
        self::assertNull($payload['data']);
    }

    function test_delete_book_with_okay_status() {
        $response = $this->request('DELETE', '/book/2');
        $payload = $response->getParsedBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame(Status::OKAY, $payload['status']);

        self::assertIsInt($payload['data']['id']);
    }

    function test_show_book_with_not_found_status() {
        $response = $this->request('GET', '/book/3');
        $payload = $response->getParsedBody();

        self::assertSame(Status::NOT_FOUND, $response->getStatus());
        self::assertSame(Status::NOT_FOUND, $payload['status']);

        self::assertNull($payload['error']);
        self::assertNull($payload['data']);
    }

    function test_show_book_with_okay_status() {
        $response = $this->request('GET', '/book/1');
        $payload = $response->getParsedBody();

        self::assertSame(Status::OKAY, $response->getStatus());
        self::assertSame(Status::OKAY, $payload['status']);

        self::assertSame(1, $payload['data']['id']);
        self::assertSame('Test 1', $payload['data']['name']);
        self::assertSame('Test 1', $payload['data']['author']);
    }
}
