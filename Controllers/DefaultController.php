<?php

namespace Controllers;

use Models\M_Articles;

class DefaultController extends C_Base
{

    public function action_index()
    {
        $pageNum = $_GET['pageNum'];

        $total = count(M_Articles::getInstance()->getAllArticles());
        $articles = M_Articles::getInstance()->getArticles($pageNum);

        $this->content = $this->Template('themes/index.php', array('short_articles' => $articles, 'pageTotal' => $total));
    }

}