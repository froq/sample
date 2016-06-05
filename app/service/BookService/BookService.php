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
     * Main.
     * @return void
     */
    public function main()
    {
        print "Hello, Froq!\n";

        // $this->useMainOnly = true;

        // open, if imported mock data into db
        // $this->doAll();
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
