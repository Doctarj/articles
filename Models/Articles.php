<?php

namespace Models;

class Articles
{
    // ссылка на экземпляр класса
    private static $instance;

    // ссылка на драйвер
    private $mysql;

    private function __construct()
    {
        $this->mysql = M_MYSQL::getInstance();
    }

    // получение единственного экземпляра класса
    public static function getInstance()
    {
        // гарантия одного экземпляра
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // общие методы для всех моделей
    public function getAllArticles()
    {
        $query = "SELECT * FROM articles ORDER BY id_article ASC";
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