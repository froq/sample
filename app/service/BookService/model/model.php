<?php
namespace Froq\App\Service;

use Froq\Database\Model\Mysql as Model;

/**
 * Book Model.
 */
class BookModel extends Model
{
    protected $stack = 'book';
    protected $stackPrimary = 'id';
}
