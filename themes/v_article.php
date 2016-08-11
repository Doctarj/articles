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
    <input type="text" name="name" value="<?php echo $name ?>">
    <br><br>
    Содержание: <br>
    <textarea name="comment"><?php echo $comment?></textarea>
    <br>
    <input type="submit" value="Добавить">
</form>