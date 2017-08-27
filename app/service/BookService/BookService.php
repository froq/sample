<?php
namespace Froq\App\Service;

use Froq\Service\Service\Site as Service;
// use Froq\App\Database\BookModel;

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
        // you've set mock db already?
        // $this->model = new BookModel();
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
    public function doAll() // route: $root/book, $root/book/all
    {
        // $this->view('main', [
        //     'data' => ['books' => $this->model->findAll()],
        //     'meta' => ['page_title' => 'The Books']
        // ]);
    }

    /**
     * Detail.
     * @param  int $id
     * @return void
     */
    public function doDetail($id) // route: $root/book/detail/$id
    {
        // $this->view('detail', [
        //     'data' => ['book' => $this->model->find($id)],
        //     'meta' => ['page_title' => sprintf('Book Detail (#%d)', $id)]
        // ]);
    }
}
