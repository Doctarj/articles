<?php
/* Основной шаблон страницы
 ==============================*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP уровень 2 - редактирование статьи</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/themes/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12 hidden-phone"><h1 class="page-header">PHP Уровень 2</h1></div>
    </div>

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">PHP</a>
            <ul class="nav navbar-nav">
                <li class="<?php echo (!isset($_GET['act'])) ? "active" : ""; ?>">
                    <a href="index.php">Главная</a>
                </li>
                <li class="<?php echo (isset($_GET['act'])) ? "active" : ""; ?>">
                    <a href="?act=editor">Консоль редактора</a>
                </li>
            </ul>
        </div>

    </nav>
    <?php echo $content ?>
    <div class="panel" id="footer">
        <small><a href="http://geekbrains.ru">Школа программирования &copy;</a></small>
    </div>
</div>
</body>
</html>