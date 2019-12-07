<?php
    namespace App\Controller;

    use App\View\View as View;
    class errorController
    {

        public static function error($message)
        {
            $v = new View("Erreur 404", "layout", "error.php");
            $v -> requireView(array('message' => $message));
        }

    }