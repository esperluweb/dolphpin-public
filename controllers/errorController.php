<?php
    namespace App\Controller;

    use App\View\View as View;
    class errorController
    {

        public static function error($message, $code = 404)
        {
            
            $v = new View("Erreur $code", "layout", "error.php");
            $v -> requireView(array(
                'message' => $message,
                'code' => $code
            ));
        }

    }