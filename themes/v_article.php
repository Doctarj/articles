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
<?php echo $article[0]['content'] ?>
<br>
<hr>
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
                    <?php echo $comment['date_comment'] ?>

                    <div class="pull-right">

                        <a class="btn btn-xs btn-danger"
                           href="?ctrl=comments&actcom=delete&idcom=<?php echo $comment['id_comment'] ?>">
                            <i class="glyphicon glyphicon-remove "></i></a><br>

                    </div>

                </li>

            <?php endforeach ?>

        </ul>
    </div>
</div>
<hr>

<form method="post" action="index.php?ctrl=comments&act=new">
    Имя<sup style="color:red">*</sup>:
    <label><?php echo $_SESSION['login']?></label>
    <br><br>
    Содержание: <br>
    <textarea name="comment"></textarea>
    <br>
    <input type="hidden" name="id_article" value="<?php echo $_GET['id'] ?> "><br/>
    <input class="btn btn-xs btn-primary" type="submit" value="Add Comment">
</form>

