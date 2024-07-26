<?php
namespace app\controller;

use froq\app\Controller;
use froq\http\response\Status;
use app\repository\data\BookDto;

/**
 * Book Controller, accepts/returns JSON data.
 */
class BookController extends Controller {
    /**
     * Target is BookRepository.
     */
    var bool $useRepository = true;

    /**
     * Forward all errors to Index Controller.
     */
    function error($e = null) {
        return $this->forward('Index.error', [$e]);
    }

    /**
     * Helper method for JSON responses.
     */
    function reply(int $status, array $data = null, array $error = null) {
        return $this->jsonPayload($status, [
            'status' => $status,
            'data'   => $data,
            'error'  => $error
        ]);
    }

    /**
     * List all books.
     *
     * @call GET /book
     */
    function listAction() {
        $data = $this->repository->findAll();

        return $this->reply(
            Status::OK,
            data: $data
        );
    }

    /**
     * Add a book.
     *
     * @call POST /book
     */
    function addAction(BookDto $book) {
        if (!$book->isValid()) {
            return $this->reply(
                Status::BAD_REQUEST,
                error: ['detail' => 'Fields name & author required']
            );
        }

        $data = $this->repository->add((array) $book);

        return $this->reply(
            $data ? Status::OK : Status::INTERNAL,
            data: $data
        );
    }

    /**
     * Edit a book.
     *
     * @call PUT /book/:id
     */
    function editAction(int $id, BookDto $book) {
        if (!$book->isValid()) {
            return $this->reply(
                Status::BAD_REQUEST,
                error: ['detail' => 'Fields name & author required']
            );
        }

        $data = $this->repository->edit($id, (array) $book);

        return $this->reply(
            $data ? Status::OK : Status::NOT_FOUND,
            data: $data
        );
    }

    /**
     * Show a book.
     *
     * @call GET /book/:id
     */
    function showAction(int $id) {
        $data = $this->repository->find($id);

        return $this->reply(
            $data ? Status::OK : Status::NOT_FOUND,
            data: $data
        );
    }

    /**
     * Delete a book.
     *
     * @call DELETE /book/:id
     */
    function deleteAction(int $id) {
        $data = $this->repository->delete($id);

        return $this->reply(
            $data ? Status::OK : Status::NOT_FOUND,
            data: $data
        );
    }
}
