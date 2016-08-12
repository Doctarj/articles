<?php

namespace Controllers;

use models\Comments;

class CommentsController extends C_Base{

    public function action_index()
    {


        $comments = Comments::getInstance()->getAllComments($_GET['id']);
        $this->content = $this->Template('themes/v_article.php', array('comments' => $comments));
    }
    public function actionComments_new(){

        if (!empty($_POST) && isset($_POST['name']) && isset($_POST['comment'])) {

            Comments::getInstance()->comments_new($_POST['name'], $_POST['comment'], $_POST['id_article']);

            $this->redirect('index.php');
        }

    }
}
