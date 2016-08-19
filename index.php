<?php
session_start();

if(!isset($_COOKIE['email'])&& !isset($_SESSION['email']) && !isset($_POST['email'])){

    header("Location: themes/auth.php");
}
else{
    if(isset($_POST['email'])){
        $email = $_POST['email'];
}
else{
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        setcookie("name", $_SESSION['email'], time() + 3600 * 24 * 7);

    }
    else {
        if (isset($_COOKIE['email'])) {
            $login = $_COOKIE['email'];
        }
    }
}
}

function __autoload($classname)
{

    $parts = explode('\\', $classname);

    $class = join('/', $parts) . '.php';

    if (file_exists($class)) {
        include_once($class);
    } else {
        throw new Exception('Class not found');
    }
}




$control = (isset($_GET['ctrl'])) ? $_GET['ctrl'] : '';
$action = 'action';
$action .= ucfirst((isset($_GET['act'])) ? $_GET['act'] : 'index');


switch ($control) {
    case 'users':
        $controller = new\Controllers\UsersController();
        break;
    case 'comments':
        $controller = new\Controllers\CommentsController();
        break;
    case 'editor':
        $controller = new \Controllers\EditorController();
        break;
    default:
        $controller = new \Controllers\DefaultController();
}

$controller->Request($action);

