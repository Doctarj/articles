<?php
include_once("W:/domains/articlesBeta/model.php");

class C_Page extends C_Base
{

    public function action_index()
    {
        $pageNum = $_GET['pageNum'];
        $this->title = 'Главная страница';

        $short_articles = articles_intro(paginate($pageNum));

        $pageTotal = pages();

        $this->content = $this->Template('/themes/index.php', array('short_articles' => $short_articles, 'pageTotal' => $pageTotal));
    }


//генерация страницы статьи
    public function action_show()
    {
        $article = articles_get($_GET['id']);
        $this->title = $article['title'];
        $this->content = $this->Template('/themes/v_article.php', array('article' => $article));

    }

//генерация страницы редактора
    public function action_editor()
    {
        $this->title = 'Панель редактора';
        $articles = articles_all();
        $this->content = $this->Template('/themes/editor.php', array('articles' => $articles));

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
        $this->content = $this->Template('/themes/v_edit.php', array('article' => $article));

    }

//генерация страницы добавления статьи
    public function action_new()
    {
        $title = '';
        $content = '';
        $error = false;
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content'])) {
            // успешно данные добавлены, редирект
            if (article_add($_POST['title'], $_POST['content'])) {
                die(header('Location: index.php'));
            }
            $title = $_POST['title'];
            $content = $_POST['content'];
            $error = true;
        }

        $this->title = $title;
        $this->content = $this->Template('/themes/v_new.php', array('title' => $title, 'content' => $content));

    }

    public function action_delete()
    {
        articles_delete($_GET['id']);
    }


}