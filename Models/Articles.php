<?php

namespace Models;

class Articles
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


    public function getAllArticles()
    {
        $query = "SELECT * FROM articles ORDER BY id_article ASC ";
        return $this->mysql->select($query);
    }

    public function getArticles($pageNum = 0, $pageSize = 10)
    {
        $query = "SELECT * FROM articles ORDER BY id_article ASC";
        return $this->mysql->select($query);
    }

    public function articles_new($title, $content)
    {
        $this->mysql->insert("articles", array('title' => $title, 'content' => $content));
    }
    public function getOneArticle($id_article){
        $query = "SELECT * FROM `articles` WHERE `id_article` = $id_article";
       return $this->mysql->select($query);
    }
    public function articles_edit($title, $content, $id_article){
        $this->mysql->update("articles", array('title' => $title, 'content' => $content), "`id_article` = $id_article");
    }
    public  function articles_delete($id_article){
        $this->mysql->delete("articles", "`id_article` = $id_article");
    }
}