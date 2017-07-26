<?php
namespace Froq\App\Service;

use Froq\Service\Service\Site as Service;

/**
 * Fail Service.
 */
class FailService extends Service
{
    /**
     * Main.
     * @return void
     */
    public function main()
    {
        $fail = get_global('app.service.fail');
        if (!isset($fail['code'])) {
            return $this->print();
        }

        // add more if needs
        if ($fail['code'] == 404) {
            $fail['error'] = '404 Not Found';
            $fail['error_detail'] = $fail['text'];
        } elseif ($fail['code'] == 500) {
            $fail['error'] = '500 Internal Server Error';
            $fail['error_detail'] = $fail['text'];
        }

        $this->print($fail);
    }

    /**
     * Print.
     * @param  any $fail
     * @return void
     */
    public function print($fail = null)
    {
        if (empty($fail)) {
            print '<h1>Error</h1>';
            print '<p>Unknown error occurred.</p>';
        } else {
            print '<h1>'. $fail['error'] .'</h1>';
            print '<p>'. $fail['error_detail'] .'.</p>';
        }
    }
}
