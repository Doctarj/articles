<?php

namespace Controllers;

use Models\Articles;

class DefaultController extends C_Base
{

    public function actionIndex()
    {
        $pageNum = $_GET['pageNum'];

        $total = count(Articles::getInstance()->getAllArticles());
        $articles = Articles::getInstance()->getAllArticles();

        $this->content = $this->Template('themes/index.php', array('short_articles' => $articles, 'pageTotal' => $total));
    }

}