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
    public bool $useRepository = true;

    /**
     * Catch all errors.
     *
     * @call internal
     */
    public function error(Throwable $e = null): BookResource {
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
    public function listAction(GetParams $params): BookResource {
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
    public function addAction(BookDto $book): BookResource {
        if (!$book->validate($errors)) {
            return new BookResource(
                error: ['validation' => $errors],
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
    public function editAction(int $id, BookDto $book): BookResource {
        if (!$book->validate($errors)) {
            return new BookResource(
                error: ['validation' => $errors],
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
    public function deleteAction(int $id): BookResource {
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
    public function showAction(int $id): BookResource {
        return new BookResource(
            $data = $this->repository->find($id),
            status: $data ? Status::OKAY : Status::NOT_FOUND
        );
    }
}
