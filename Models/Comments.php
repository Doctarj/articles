<?php

namespace models;

class Comments {

    private static $instance;


    private $mysql;

    private function __construct()
    {
        $this->mysql = M_MYSQL::getInstance();
    }


    public static function getInstance()
    {

        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function getAllComments($id_article){
        $query = "SELECT * FROM `comments` ORDER BY `id_comments` ASC WHERE `id_article` = $id_article";

        return $this->mysql->select($query);
    }
    public function comments_new($name, $comment, $id_article){
        $this->mysql->insert("comments", array('name' => $name, 'comment' => $comment, 'id_article' =>$id_article));
    }
}