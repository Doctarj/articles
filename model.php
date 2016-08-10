<?php
// Список всех статей
function articles_all()
{
    // запрос

    $query = "SELECT * FROM `articles` WHERE 1";

    $result = mysqli_query(getDbConnect(), $query);
    if (!$result) {
        die(mysqli_error(getDbConnect()));
    }
    // извлекаем из Бд данные

    $rows = mysqli_num_rows($result);

    $articles = [];

    if (!$rows) {
        return $articles;
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }
    return $articles;
}

// Выборка одной статьи
function articles_get($id_article)
{
    //подготовка данных
    $id_article = trim($id_article);
// запрос
    $sql = "SELECT * FROM `articles` WHERE `id_article` ='%s'";
    $query = sprintf($sql, escape($id_article));
    $result = mysqli_query(getDbConnect(), $query);
    if (!$result) {
        die(mysqli_error(getDbConnect()));
    }
    // извлекаем из Бд данные

    return mysqli_fetch_assoc($result);
}

// Добавление статьи
function article_add($title, $content)
{
// подготовка данных
    $title = trim($title);
    $content = trim($content);
    $date = new DateTime();
    //проверка
    if ($title == "") {
        return false;
    }
    //запрос
    $sql = "INSERT INTO `articles` (`title`, `content`, `date`) VALUES ('%s', '%s', '%s')";
    $query = sprintf($sql, escape($title), escape($content), $date->format('Y-m-d H:i:s'));
    $result = mysqli_query(getDbConnect(), $query);
    if (!$result) {
        die(mysqli_error(getDbConnect()));
    }
    return true;
}

// Редактирование статьи
function articles_edit($id_article, $title, $content)
{
// подготовка данных
    $title = trim($title);
    $content = trim($content);
    $id_article = trim($id_article);
    $date = new DateTime();

    //проверка
    if ($id_article == "") {
        return false;
    }
    //запрос
    $sql = "UPDATE  `articles_db`.`articles` SET  `title` =  '%s',
`content` =  '%s', `date` = '%s' WHERE  `articles`.`id_article` ='%s'";
    $query = sprintf($sql, escape($title), escape($content), $date->format('Y-m-d H:i:s'), escape($id_article));
    $result = mysqli_query(getDbConnect(), $query);
    if (!$result) {
        die(mysqli_error(getDbConnect()));
    }
    return true;

}

// Подключение шаблона.

function template($fileName, $vars = array())
{
    // Устанавливаем переменные из массива в шаблон
    extract($vars);

    // Генерация HTML в строку.
    ob_start();
    include $fileName;
    return ob_get_clean();
}

// Удаление статьи
function articles_delete($id_article)
{
    //подготовка данных
    $id_article = trim($id_article);
    //запрос
    $sql = "DELETE FROM `articles_db`.`articles` WHERE `articles`.`id_article` = '%s'";
    $query = sprintf($sql, escape($id_article));
    $result = mysqli_query(getDbConnect(), $query);

    if (!$result) {
        die(mysqli_error(getDbConnect()));
    } else {
        die(header('Location: index.php'));
    }
}

// Короткое описание статьи
function articles_intro(array $articles, $length = 100)
{
    $short_articles = [];

    foreach ($articles as $article) {
        $string = mb_substr($article['content'], 0, $length, 'UTF-8');
        $short_articles[] = [
            'id_article' => $article['id_article'], 'title' => $article['title'], 'content' => $string, 'date' => $article['date']
        ];
    }

    return $short_articles;
}

function paginate($pageNum = 0, $pageCount = 2)
{
    $pageNum = $pageNum ? $pageNum - 1 : 0;

    $currentPage = $pageNum * $pageCount;

    $query = "SELECT * FROM  `articles` LIMIT $currentPage , $pageCount";
    $result = mysqli_query(getDbConnect(), $query);
    if (!$result) {
        die(mysqli_error(getDbConnect()));
    }

    $articles = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }

    return $articles;
}

function pages($pageCount = 2)
{
    $queryTotal = "SELECT COUNT(*) FROM `articles`";

    $resultTotal = mysqli_query(getDbConnect(), $queryTotal);

    $row = mysqli_fetch_row($resultTotal);

    $total = $row[0];

    $pageTotal = ceil($total / $pageCount);

    return $pageTotal;
}