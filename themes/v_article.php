<?php
    /*Шаблон отображение выбраной статьи
    ============================
    $title - заголовок
    $content - содержание
    $error - ошибка юзера*/
?>

<hr>
<h2><?php echo $article[0]['title'] ?></h2>

*************************<br>
    Содержание: <br>
*************************<br>
    <?php echo $article[0]['content']?>
    <br>
<hr>

<form method="post">
    Имя<sup style="color:red">*</sup>: <br>
    <input type="text" name="name">
    <br><br>
    Содержание: <br>
    <textarea name="comment"></textarea>
    <br>
    <input type="hidden" name="id_article" value="<?php echo $_GET['id']?> "><br/>
    <a class="btn btn-xs btn-warning" href="?ctrl=comments&actcom=new">
        <i>Add Comment</i></a>
</form>

<div class="panel panel-default">
    <div class="panel-heading">
        Comments list
    </div>
    <div class="panel-body">
        <ul class="list-group">

            <?php foreach ($comments as $comment): ?>

                <li class="list-group-item list-group-item-info">
                    <?php echo $comment['name'] ?> <br/>
                   <?php echo $comment['comment'] ?>
                    <div class="pull-right">

                        <a class="btn btn-xs btn-danger" href="?ctrl=comments&actcom=delete&idcom=<?php echo $comment['id_comment'] ?>">
                            <i class="glyphicon glyphicon-remove "></i></a><br>

                    </div>
                </li>
            <?php endforeach ?>

        </ul>
    </div>
