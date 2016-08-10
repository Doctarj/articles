<?php /*
Шаблон редактируемой страницы
==============================
$articles - список статей

статья
id_article - идентифицатор
title - заголовок
content - текст
*/
?>


<div class="panel panel-default">
    <div class="panel-heading">
        Articles list
    </div>
    <div class="panel-body">
        <ul class="list-group">

            <?php foreach ($articles as $article): ?>

                <li class="list-group-item list-group-item-info">
                    <?php echo $article['title'] ?>
                    <i><?php echo $article['date'] ?></i>
                    <div class="pull-right">
                        <a class="btn btn-xs btn-success" href="?act=edit&id=<?php echo $article['id_article'] ?>">
                            <i class="glyphicon glyphicon-pencil "></i></a>
                        <a class="btn btn-xs btn-danger" href="?act=delete&id=<?php echo $article['id_article'] ?>">
                            <i class="glyphicon glyphicon-remove "></i></a><br>

                    </div>
                </li>
            <?php endforeach ?>

        </ul>
    </div>
    <div class="panel-footer text-right"><a class="btn btn-xs btn-warning " href="?act=new">New article</a></div>
</div>



