<?php
namespace Froq\App\Service;

use Froq\Database\Model\Mysql as Model;

/**
 * Book Model.
 */
class BookModel extends Model
{
    // table name & table primary for mysql
    protected $stack = 'book';
    protected $stackPrimary = 'id';

    /**
     * Init
     * @return void
     */
    public function init()
    {
        // manipulate pager parameters if needed
        // $this->pager
        //     ->setAutorun(false)
        //     ->setNumerateFirstLast(true)
        //     ->setStart((int) app()->request->params->get('start'))
        //     ->setStop((int) app()->request->params->get('stop'))
        // ;
    }
}
