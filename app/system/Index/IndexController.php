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
    function init(): void {
        // Init operations.
    }

    /**
     * Before.
     */
    function before(): void {
        // Before operations.
    }

    /**
     * After.
     */
    function after(): void {
        // After operations.
    }

    /**
     * Index.
     *
     * @call * /
     */
    function index(): void {
        echo "Hello, Froq!", "\n";
    }

    /**
     * Error.
     *
     * @call * /error
     * @call internal
     */
    function error(Throwable $e = null): void {
        echo "Error!", "\n";
        if ($e) {
            echo "Code: ", $e->getCode(), "\n";
            echo "Message: ", $e->getMessage(), "\n";
            echo $e, "\n";
        }
    }
}
