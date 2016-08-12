<?php

namespace Controllers;

use Models\Comments;

class CommentsController extends C_Base
{

    public function actionIndex()
    {
        $comments = Comments::getInstance()->getAllComments($_GET['id']);
        $this->content = $this->Template('themes/articleShow.php', array('comments' => $comments));
    }

    public function actionNew()
    {
        if (!empty($_POST) && isset($_POST['name']) && isset($_POST['comment'])) {

            Comments::getInstance()->addNewComment($_POST['name'], $_POST['comment'], $_POST['id_article']);

            $this->redirect('index.php?ctrl=editor&act=show&actcom=show&id=' . $_POST['id_article']);
        }

    }
}
