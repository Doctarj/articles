<?php

namespace Models;

class Comments
{

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

    public function getAllComments($id_article)
    {
        $query = "SELECT * FROM `comments` WHERE `id_article` = $id_article ORDER BY `id_comment` ASC ";

        return $this->mysql->select($query);
    }

    public function addNewComment($name, $comment, $id_article)
    {
        $now = new \DateTime();

        $this->mysql->insert("comments", array('name' => $name, 'comment' => $comment, 'id_article' => $id_article, 'date_comment' => $now->format('Y-m-d H:m:i')));
    }
}