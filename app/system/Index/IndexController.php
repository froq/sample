<?php
namespace app\controller;

use froq\mvc\Controller;

/**
 * Index Controller.
 */
class IndexController extends Controller
{
    /**
     * Load & use.
     */
    // var bool $useView = true;
    // var bool $useModel = true;
    // var bool $useSession = true;

    /**
     * Init.
     */
    function init()
    {
        // Init operations.
    }

    /**
     * Index.
     */
    function index()
    {
        echo "Hello, Froq!", "\n";
    }

    /**
     * Error.
     */
    function error($e = null)
    {
        echo "Error!", "\n";
        if ($e) {
            echo $e, "\n";
            echo "Code: ", $e->getCode(), "\n";
            echo "Message: ", $e->getMessage(), "\n";
        }
    }

    /**
     * Favicon action.
     */
    function faviconAction()
    {
        $this->response(404, null, ['type' => 'n/a']);
    }
}
