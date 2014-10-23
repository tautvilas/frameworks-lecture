<?php

class Model {
    var $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getPosts() {
        return $this->db->query('SELECT * FROM `POST`');
    }

    public function addPost($text) {
        $statement = $this->db->prepare('INSERT INTO `POST` (text) VALUES (:text)');
        $statement->bindValue(':text', $text, SQLITE3_TEXT);
        return $statement->execute();
    }
}
