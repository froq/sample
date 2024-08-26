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
    // public bool $useRepository = true;
    // public bool $useSession = true;
    // public bool $useView = true;

    public function __construct(
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
    public function init(): void {
        // Init operations.
        // error_reporting(0);
        // error_displaying(false);
    }

    /**
     * Before.
     */
    public function before(): void {
        // Before operations.
    }

    /**
     * After.
     */
    public function after(): void {
        // After operations.
    }

    /**
     * Index.
     *
     * @call * /
     */
    public function index(HelloInterface $hello): void {
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
    public function error(Throwable $e = null): void {
        echo "Error!", "\n";
        if ($e) {
            echo "Code: ", $e->getCode(), "\n";
            echo "Message: ", $e->getMessage(), "\n";
            echo $e, "\n";
        }
    }

    /**
     * Test for annotated route.
     *
     * @see config/routes.with-annots.php
     * @call * /test-annot
     */
    public function testAnnotAction(): void {
        echo "Replied for annotated method!", "\n";
    }

    /**
     * Test for attributed route.
     *
     * @see config/routes.with-attribs.php
     */
    #[meta('/test-attrib', method: '*')]
    public function testAttribAction(): void {
        echo "Replied for attributed method!", "\n";
    }
}
