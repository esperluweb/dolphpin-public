<?php
    namespace App\Model;
    class BlogModel extends Model
    {

        public function getTruc()
        {
            return $this->executerRequete("SELECT * FROM partners WHERE id = ?", array("1"))->fetchAll();
        }

        public function getMachin($id)
        {
            return $this->executerRequete("SELECT * FROM partners WHERE id = ?", array($id))->fetchAll();
        }

    }