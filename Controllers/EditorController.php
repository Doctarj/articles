<?php

namespace Controllers;

use Models\Articles;
use Models\Comments;

class EditorController extends C_Base
{

    public function actionShow()
    {
        $article = Articles::getInstance()->getOneArticle($_GET['id']);
        $comments = Comments::getInstance()->getAllComments($_GET['id']);

        $this->content = $this->Template('themes/articleShow.php', array('article' => $article, 'comments' => $comments));

    }

//генерация страницы редактора
    public function actionIndex()
    {
        $this->title = 'Панель редактора';
        $total = count(Articles::getInstance()->getAllArticles());
        $articles = Articles::getInstance()->getArticles();

        foreach ($articles as &$article) {
            $article['comments'] = Comments::getInstance()->getAllComments($article['id_article']);
        }

        $this->content = $this->Template('themes/articleList.php', array('articles' => $articles));
    }


//генерация страницы редактирования статьи
    public function actionEdit()
    {
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content']) && isset ($_GET['id'])) {


            Articles::getInstance()->articles_edit($_POST['title'], $_POST['content'], $_GET['id']);
            $this->redirect('index.php');


        }

        $article = Articles::getInstance()->getOneArticle($_GET['id']);

        $this->content = $this->Template('themes/articleEdit.php', array('article' => $article));

    }

    public function actionNew()
    {
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['content'])) {

            Articles::getInstance()->articles_new($_POST['title'], $_POST['content']);

            $this->redirect('index.php');
        }

        $this->content = $this->Template('themes/articleNew.php');
    }

    public function actionDelete()
    {
        Articles::getInstance()->articles_delete($_GET['id']);
        $this->redirect('index.php');
    }


}