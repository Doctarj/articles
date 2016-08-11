<?php

namespace Controllers;

use Models\Articles;

class EditorController extends C_Base
{

    public function action_show()
    {
        $article = Articles::getInstance()->getOneArticle($_GET['id']);

        $this->content = $this->Template('themes/v_article.php', array('article' => $article));

    }

//генерация страницы редактора
    public function action_index()
    {
        $this->title = 'Панель редактора';
        $total = count(Articles::getInstance()->getAllArticles());
        $articles = Articles::getInstance()->getArticles();
        $this->content = $this->Template('themes/editor.php', array('articles' => $articles));
    }


//генерация страницы редактирования статьи
    public function action_edit()
    {
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content']) && isset ($_GET['id'])) {


           Articles::getInstance()->articles_edit($_POST['title'], $_POST['content'],$_GET['id']);
                $this->redirect('index.php');


        }

        $article = Articles::getInstance()->getOneArticle($_GET['id']);

        $this->content = $this->Template('themes/v_edit.php', array('article' => $article));

    }

    public function action_new()
    {
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content'])) {

            Articles::getInstance()->articles_new($_POST['title'], $_POST['content']);

            $this->redirect('index.php');
        }

        $this->content = $this->Template('themes/v_new.php');
    }

    public function action_delete()
    {
        Articles::getInstance()->articles_delete($_GET['id']);
        $this->redirect('index.php');
    }


}