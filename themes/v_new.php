<?php /*
Шаблон создания новой статьи
============================
$title - заголовок
$content - содержание
$error - ошибка юзера
*/?>

<hr>
<h2>Новая статья</h2>
<?php if ($error): ?>
    <b style="color:red">Заполните все поля!</b>
<?php endif; ?>
<form method="post">
    Название<sup style="color:red">*</sup>: <br>
    <input type="text" name="title" value="<?php echo $title ?>">
    <br><br>
    Содержание: <br>
    <textarea name="content"><?php echo $content?></textarea>
    <br>
    <input type="submit" value="Добавить">
</form>
<hr>
