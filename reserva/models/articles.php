<?php

    include "db.php";

    class Articles {

        public function getAll() {
            $db = new Db();
            $db->createConnection('localhost', 'root', '', 'acl');
            $articles = $db->dataQuery('SELECT fecha, titulo FROM articulo');
            $db->closeConnection();
            return $articles;
        }
}