<?php

namespace Controllers;

use Models\M_Articles;

class EditorController extends C_Base
{

    public function action_show()
    {
        $article = articles_get($_GET['id']);
        $this->title = $article['title'];
        $this->content = $this->Template('themes/v_article.php', array('article' => $article));

    }

//генерация страницы редактора
    public function action_index()
    {
        $this->title = 'Панель редактора';
        $total = count(M_Articles::getInstance()->getAllArticles());
        $articles = M_Articles::getInstance()->getArticles();
        $this->content = $this->Template('themes/editor.php', array('articles' => $articles));
    }


//генерация страницы редактирования статьи
    public function action_edit()
    {
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content']) && isset ($_GET['id'])) {
            // успешно редактирование статьи, редирект
            if (articles_edit($_GET['id'], $_POST['title'], $_POST['content'])) {
                die(header('Location: index.php'));
            }
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id_article = $_GET['id'];
            $error = true;
        }

        $article = articles_get($_GET['id']);
        $this->title = $article['title'];
        $this->content = $this->Template('themes/v_edit.php', array('article' => $article));

    }

    public function action_new()
    {
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content'])) {

            M_Articles::getInstance()->articles_new($_POST['title'], $_POST['content']);

            $this->redirect('index.php');
        }

        $this->content = $this->Template('themes/v_new.php');
    }

    public function action_delete()
    {
        articles_delete($_GET['id']);
    }


}