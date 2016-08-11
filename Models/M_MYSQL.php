<?php
namespace Models;

 class M_MYSQL{

     // Настройки подключения к БД.
     private $hostname = 'articlesbeta';
     private $username = 'mysql';
     private $password = 'mysql';
     private $dbName   = 'articles_db';

     private static $instance;

     protected $link;

     // SINGLETON
     public static function getInstance()
     {
         if (self::$instance == null) {
             self::$instance = new self();
         }
         return self::$instance;
     }
     private function __construct()
     {
         // Подключение к БД
         $link = mysqli_connect($this->hostname, $this->username, $this->password);
         $db = mysqli_select_db($link, $this->dbName);
         // Создание БД, таблицы и заполнение таблицы
         if(!$db) {
             mysqli_select_db($link, $this->dbName);
         }
         mysqli_query($link, 'SET NAMES utf8');
         mysqli_set_charset($link, 'utf8');
         $this->link = $link;
     }

     public function select($query)
     {
         $result = mysqli_query($this->link, $query);
         if (!$result) {
             die(mysqli_error($this->link));
         }
         $arr = [];
         while ($row = mysqli_fetch_assoc($result)) {
             $arr[] = $row;
         }
         return $arr;
     }

     public function insert($table, $object)
     {
         $columns = array();
         $values = array();

         foreach($object as $key => $value) {
             $key = mysqli_escape_string($this->link, $key . '');
             $columns[] = "`$key`";
             if ($value == null) {
                 $values[] = 'NULL';
             } else {
                 $value = mysqli_escape_string($this->link, $value . '');
                 $values[] = "'$value'";
             }
         }
         $columns = implode(', ', $columns);
         $values = implode(', ', $values);

         $query = sprintf("INSERT INTO `%s` (%s) VALUES (%s)", $table, $columns, $values);
         $result = mysqli_query($this->link, $query);
         if (!$result) {
             die(mysqli_error($this->link));
         }
         return mysqli_insert_id($this->link);
     }
     public function update($table, $object, $where)
     {
         $sets = array();
         foreach ($object as $key => $value) {
             $key = mysqli_escape_string($this->link, $key . '');
             if ($value === null) {
                 $sets[] = "`$key`=NULL";
             } else {
                 $value = mysqli_escape_string($this->link, $value . '');
                 $sets[] = "`$key`='$value'";
             }
         }
         $sets = implode(', ', $sets);
         $query = sprintf("UPDATE `%s` SET %s WHERE %s", $table, $sets, $where);
         $result = mysqli_query($this->link, $query);
         if (!$result) {
             die(mysqli_error($this->link));
         }
         return mysqli_affected_rows($this->link);
              }
     public function delete($table, $where)
     {
         $query = sprintf("DELETE FROM %s WHERE %s", $table, $where);
         $result = mysqli_query($this->link, $query);
         if (!$result) {
             die(mysqli_error($this->link));
         }
         return mysqli_affected_rows($this->link);
     }

 }