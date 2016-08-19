<?php
namespace Controllers;

 use Models\Users;
class UsersController extends C_Base{


    public function actionNew()
    {

        if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])
            && isset($_POST['rePassword']) && isset($_POST['email'])) {
            if($_POST['password'] !== $_POST['rePassword'] ){
                die ("Введеные пароли не совпадают");
            }
            else{

            Users::getInstance()->addUser($_POST['login'], md5($_POST['password']), $_POST['email']);

            $this->redirect("themes/auth.php");
        }
        }

    }
    public function actionAuth()
    {

        if(!empty($_POST) && isset($_POST['email']) && isset($_POST['password'])){
         $result =  Users::getInstance()->auth($_POST['email'], md5($_POST['password']));

            if($result == null){
                echo "Введенные данные не совпадают";
            }
            else{



                $_SESSION['login'] =  $result[0]['login'];
                $_SESSION['email'] = $result[0]['email'];
                $_SESSION['password'] = $result[0]['password'];

                $this->redirect("index.php");
            }
        }

    }

}