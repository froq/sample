<?php declare(strict_types=1);

namespace app\controller;

use froq\app\Controller;
use Throwable;

/**
 * Index Controller.
 */
class IndexController extends Controller {
    /**
     * Load & use.
     */
    // var bool $useRepository = true;
    // var bool $useSession = true;
    // var bool $useView = true;

    /**
     * Init.
     */
    function init() {
        // Init operations.
    }

    /**
     * Index.
     */
    function index() {
        echo "Hello, Froq!", "\n";
    }

    /**
     * Error.
     */
    function error(Throwable $e = null) {
        echo "Error!", "\n";
        if ($e) {
            echo "Code: ", $e->getCode(), "\n";
            echo "Message: ", $e->getMessage(), "\n";
            echo $e, "\n";
        }
    }

    /**
     * Favicon action.
     */
    function faviconAction() {
        $this->response(404, null, ['type' => 'n/a']);
    }
}
