<?php declare(strict_types=1);

namespace app\controller;

use froq\app\Controller;
use froq\http\response\Status;
use froq\http\request\params\GetParams;
use app\repository\{BookResource, BookQuery, data\BookDto};
use Throwable;

/**
 * Book Controller, accepts/returns JSON data.
 */
class BookController extends Controller {
    /**
     * Target is BookRepository.
     */
    var bool $useRepository = true;

    /**
     * Catch all errors.
     *
     * @call internal
     */
    function error(Throwable $e = null): BookResource {
        if ($this->isHttpException($e)) {
            $error = $e->getMessage();
            $status = $e->getCode();
        }

        return new BookResource(
            error: $error ?? null,
            status: $status ?? Status::INTERNAL
        );
    }

    /**
     * List / search books.
     *
     * @call GET /book
     */
    function listAction(GetParams $params): BookResource {
        return new BookResource(
            $data = $this->repository->findAll(
                where: new BookQuery($params),
                page: $params->getInt('page', 1),
                pager: $pager // byref.
            ),
            meta: [
                'total' => size($data),
                'pager' => $pager
            ],
            status: $data ? Status::OKAY : Status::NOT_FOUND
        );
    }

    /**
     * Add a book.
     *
     * @call POST /book
     */
    function addAction(BookDto $book): BookResource {
        if (!$book->isValid()) {
            return new BookResource(
                error: 'Fields name & author required',
                status: Status::BAD_REQUEST
            );
        }

        return new BookResource(
            $data = $this->repository->add($book),
            status: $data ? Status::OKAY : Status::INTERNAL
        );
    }

    /**
     * Edit a book.
     *
     * @call PUT /book/:id
     */
    function editAction(int $id, BookDto $book): BookResource {
        if (!$book->isValid()) {
            return new BookResource(
                error: 'Fields name & author required',
                status: Status::BAD_REQUEST
            );
        }

        return new BookResource(
            $data = $this->repository->edit($id, $book),
            status: $data ? Status::OKAY : Status::NOT_FOUND
        );
    }

    /**
     * Delete a book.
     *
     * @call DELETE /book/:id
     */
    function deleteAction(int $id): BookResource {
        return new BookResource(
            $data = $this->repository->delete($id),
            status: $data ? Status::OKAY : Status::NOT_FOUND
        );
    }

    /**
     * Show a book.
     *
     * @call GET /book/:id
     */
    function showAction(int $id): BookResource {
        return new BookResource(
            $data = $this->repository->find($id),
            status: $data ? Status::OKAY : Status::NOT_FOUND
        );
    }
}
