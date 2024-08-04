<?php
namespace app\controller;

use froq\app\Controller;
use froq\http\response\Status;
use app\repository\data\BookDto;
use app\repository\{BookQuery, BookResource};

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
        $this->forward('Index.error', [$e]);
    }

    /**
     * List / search books.
     *
     * @call GET /book
     */
    function listAction() {
        return new BookResource(
            $data = $this->repository->findAll(
                query: new BookQuery($this),
                page: (int) $this->request->get('page', 1),
                pager: $pager // byref.
            ),
            meta: [
                'total' => $pager->getTotalRecords(),
                'pager' => $pager
            ],
            status: $data ? Status::OK : Status::NOT_FOUND
        );
    }

    /**
     * Add a book.
     *
     * @call POST /book
     */
    function addAction(BookDto $book) {
        if (!$book->isValid()) {
            return new BookResource(
                error: ['detail' => 'Fields name & author required'],
                status: Status::BAD_REQUEST
            );
        }

        return new BookResource(
            $data = $this->repository->add($book->toArray()),
            status: $data ? Status::OK : Status::INTERNAL
        );
    }

    /**
     * Edit a book.
     *
     * @call PUT /book/:id
     */
    function editAction(int $id, BookDto $book) {
        if (!$book->isValid()) {
            return new BookResource(
                error: ['detail' => 'Fields name & author required'],
                status: Status::BAD_REQUEST
            );
        }

        return new BookResource(
            $data = $this->repository->edit($id, $book->toArray()),
            status: $data ? Status::OK : Status::NOT_FOUND
        );
    }

    /**
     * Show a book.
     *
     * @call GET /book/:id
     */
    function showAction(int $id) {
        return new BookResource(
            $data = $this->repository->find($id),
            status: $data ? Status::OK : Status::NOT_FOUND
        );
    }

    /**
     * Delete a book.
     *
     * @call DELETE /book/:id
     */
    function deleteAction(int $id) {
        return new BookResource(
            $data = $this->repository->delete($id),
            status: $data ? Status::OK : Status::NOT_FOUND
        );
    }
}
