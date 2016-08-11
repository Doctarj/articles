<?php
function startup(){
//   getDbConnect();

    // языковая настройка
    setlocale(LC_ALL, 'ru_Ru.UTF-8');
    mb_internal_encoding('UTF-8');

    //Открытие Сесии
    session_start();

}
//function getDbConnect(){
//    static $link;
//    // настройка подключение к БД
//    $hostName = "localhost";
//    $mysqlName = "root";
//    $mysqlPassword = "";
//    $mysql_db = "article_db";
//
//    // Подключение к БД
//    if($link===null) {
//        $link = mysqli_connect($hostName, $mysqlName, $mysqlPassword) or die("No Connect with DATABASE");
//        mysqli_query($link, 'SET NAMES utf8');
//        mysqli_set_charset($link, 'utf8');
//        mysqli_select_db($link, $mysql_db) or die("No DATABASE");
//    }
//    return $link;
//}
//экранирование переменных
function escape($param){
//   return mysqli_escape_string(getDbConnect(),$param);
}
