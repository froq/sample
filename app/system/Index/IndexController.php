<?php
namespace app\controller;

use froq\mvc\Controller;

/**
 * Index Controller.
 */
class IndexController extends Controller
{
    /** @var bool */
    // public bool $useView = true;
    // public bool $useModel = true;
    // public bool $useSession = true;

    /**
     * Init.
     * @return void
     */
    public function init()
    {
        // Init operations.
    }

    /**
     * Index.
     * @return void
     */
    public function index()
    {
        print "Hello, Froq!\n";
    }

    /**
     * Error.
     * @param Throwable|null $e
     * @return void
     */
    public function error($e = null)
    {
        print "Error!\n";
        if ($e) {
            print "Code: ". $e->getCode();
        }
    }

    /**
     * Favicon action.
     * @return void
     */
    public function faviconAction()
    {
        $this->app->response()->setStatus(404)->setBody(null, ['type' => 'n/a']);
    }
}
