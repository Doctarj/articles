<?php
function __autoload($classname)
{
    if (file_exists("controller/$classname.php")) {
        include_once("controller/$classname.php");
    } else {
        throw new Exception('Class not found');
    }

}

//подключаемся к БД
require_once('startup.php');
startup();

$control = (isset($_GET['c'])) ? $_GET['c'] : '';
$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($control) {
    case 'article':
        $controller = new C_Page();
        break;
    default:
        $controller = new C_Page();
}


$controller->Request($action);
