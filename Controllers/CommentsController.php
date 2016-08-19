<?php

namespace Controllers;

use Models\Comments;

class CommentsController extends C_Base
{

    public function actionIndex()
    {
        $comments = Comments::getInstance()->getAllComments($_GET['id']);
        $this->content = $this->Template('themes/v_article.php', array('comments' => $comments));
    }

    public function actionNew()
    {
        if (!empty($_POST) && isset($_SESSION['login']) && isset($_POST['comment'])) {

            Comments::getInstance()->addNewComment($_SESSION['login'], $_POST['comment'], $_POST['id_article']);

            $this->redirect('index.php?ctrl=editor&act=show&actcom=show&id=' . $_POST['id_article']);
        }

    }
}
