<?php declare(strict_types=1);

namespace app\repository;

use froq\database\query\QueryParams;
use froq\http\request\params\GetParams;

/**
 * Query class for books.
 */
class BookQuery extends QueryParams {
    /**
     * @override
     */
    function __construct(GetParams $params) {
        if ($id = $params->getInt('id')) {
            $this->addIn('id', [$id]);
        } else {
            if ($name = $params->getString('name')) {
                $this->addLike('name', ['%', $name, '%'], true);
            }
        }
    }
}
