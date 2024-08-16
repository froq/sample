<?php declare(strict_types=1);
namespace app\repository;

use froq\database\Query;
use froq\http\request\params\GetParams;

/**
 * Query class for books.
 * @data
 */
class BookQuery extends Query {
    /**
     * @override
     */
    function __construct(GetParams $params) {
        parent::__construct(app()->database);

        if ($id = $params->getInt('id')) {
            $this->equal('id', $id);
        } else {
            if ($name = $params->getString('name')) {
                $this->likeBoth('name', $name);
            }
        }
    }
}
