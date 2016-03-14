<?php
use Froq\Service\Protocol\Site as Service;

class FailService extends Service
{
   public function main()
   {
      $fail = [];
      if (isset($this->viewData['fail']['code'])) {
         if ($this->viewData['fail']['code'] == 404) {
            $fail['error'] = '404 Not Found';
            $fail['error_detail'] = $this->viewData['fail']['text'];
         } elseif ($this->viewData['fail']['code'] == 500) {
            $fail['error'] = '500 Internal Server Error';
            $fail['error_detail'] = $this->viewData['fail']['text'];
         // } elseif (...) {
         }
      }
      $this->print($fail);
   }

   public function print($fail = null)
   {
      if (empty($fail)) {
         print('<h1>Error</h1>');
         print('<p>Unknown error occurred.</p>');
      } else {
         printf('<h1>%s</h1>', $fail['error']);
         printf('<p>%s.</p>', $fail['error_detail']);
      }
   }
}
