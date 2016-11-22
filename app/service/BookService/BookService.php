<?php
namespace Froq\App\Service;

use Froq\Service\Protocol\Site as Service;

/**
 * Book Service.
 */
class BookService extends Service
{
    // use view?
    protected $useView = true;

    // use main only?
    // protected $useMainOnly = true;

    // allowed methods
    protected $allowedRequestMethods = ['GET', 'POST'];

    /**
     * Init.
     * @return void
     */
    public function init()
    {
        $this->model = new BookModel();
    }

    /**
     * Fall.
     * @return void
     */
    public function fall()
    {
        print 'Failed, method not found!';
    }

    /**
     * Main.
     * @return void
     */
    public function main()
    {
        $this->doAll();
    }

    /**
     * All.
     * @return void
     */
    public function doAll()
    {
        $this->view('main', [
            'books' => $this->model->findAll()
        ]);
    }

    /**
     * Detail.
     * @param  int $id
     * @return void
     */
    public function doDetail($id)
    {
        $this->view('main', [
            'books' => $this->model->find($id)
        ]);
    }
}
