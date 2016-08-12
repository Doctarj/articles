<?php /*
Шаблон создания новой статьи
============================
$title - заголовок
$content - содержание
$error - ошибка юзера
*/ ?>

<hr>
<h2>Редактирование статьи</h2>
<?php if ($error): ?>
    <b style="color:red">Заполните все поля!</b>
<?php endif; ?>
<form method="post">
    <div class="row">
        <div class="form-group">
            <label>Название</label><sup style="color:red">*</sup>: <br>
            <input type="text" class="form-control" name="title" value="<?php echo $article[0]['title'];
            ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label>Содержание</label>: <br>
            <textarea class="form-control" rows="10" name="content"><?php echo $article[0]['content']; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input class="btn btn-primary pull-right" type="submit" value="Изменить">
        </div>
    </div>
</form>
<hr>
