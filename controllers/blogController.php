<?php
    namespace App\Controller;

    use App\Model\BlogModel as BlogModel;
    use App\View\View as View;
    class blogController
    {

        public function blog(): void
        {
            $b = new BlogModel();
            $truc = $b->getTruc();
            $v = new View("Blog", "layout", "test.php");
            $v -> requireView(array("truc" => $truc));
        }

        public function test()
        {
            $b = new BlogModel();
            $truc = $b->getTruc();
            $v = new View("Test", "layout", "test.php");
            $v -> requireView(array("truc" => $truc));
        }

        public function michel()
        {
            $b = new BlogModel();
            $truc = $b->getTruc();
            $v = new View("Michel", "layout", "test.php");
            $v -> requireView(array("truc" => $truc));
        }

        public function machin($id)
        {
            $b = new BlogModel();
            $machin = $b -> getMachin($id);
            $v = new View("Machin", "layout", "test.php");
            $v -> requireView(array("truc" => $machin));
        }

    }