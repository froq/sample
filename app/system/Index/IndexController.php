<?php declare(strict_types=1);


namespace app\controller;

use froq\app\Controller;
use froq\session\Session;
use froq\log\Logger;
use app\service\HelloInterface;
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

    function __construct(
        /** As an alternative for $useSession option. */
        public readonly Session $session,
        /** As an alternative for $app->logger instance. */
        public readonly Logger $logger,
    ) {
        // Optional.
        parent::__construct();

        // Start session, set visitor name.
        $this->session->start();
        $this->session->set('name', 'Ghost');

        // Log that session was started.
        $this->logger->log('Session started...');
    }

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
    function index(HelloInterface $hello): void {
        echo "Hello, Froq!", "\n";
        echo $hello->say(), "\n";

        $name = $this->request->get('name')
             ?: $this->session->get('name');

        if ($name) {
            echo $hello->say($name), "\n";
        }
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
