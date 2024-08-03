<?php
namespace app\repository;

use froq\database\Query;
use app\controller\BookController;

/**
 * Query class for books.
 * @data
 */
class BookQuery extends Query {
    /**
     * @override
     */
    function __construct(
        private BookController $controller
    ) {
        // Send same database instance to base Query.
        parent::__construct($controller->repository->db());

        /** @var UrlQuery|null (sugar) */
        if ($q = $controller->request->query()) {
            if ($id = (int) $q->get('id')) {
                $this->in('id', [$id]);
            }
            if ($name = (string) $q->get('name')) {
                $this->likeBoth('name', $name);
            }
        }
    }
}
