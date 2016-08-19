<?php

namespace Models;

class Users extends M_MYSQL
{

    private static $instance;


    private $mysql;

    private function __construct()
    {
        $this->mysql = M_MYSQL::getInstance();
    }


    public static function getInstance()
    {

        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function addUser($login, $password, $email){

        $this->mysql->insert("users", array('login' => $login, 'password' => $password, 'email'=> $email));
    }

    public function auth($email, $password){
        $query = "SELECT * FROM  `users` WHERE  `email` = '$email' AND  `password` =  '$password'";

        return $this->mysql->select($query);

    }
}