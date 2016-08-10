<?php
include_once "W:/domains/articlesBeta/startup.php";
abstract class C_Base extends C_Controller
{
    protected $title;        // заголовок сайта
    protected $content;        // содержание страницы
    protected $title_page;  // заголовок страницы

    function __construct()
    {

        // создание линка подключение к БД
        startup();


    }

    protected function before()
    {
        $this->title = 'Мой сайт';    // заголовок сайта
        $this->content = '';        // содержимое страницы
    }

    public function render()
    {

        $vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->Template('themes/v_main.php', $vars);

        echo $page;
    }

}