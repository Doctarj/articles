<?php
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
$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($control) {
    case 'editor':
        $controller = new \Controllers\EditorController();
        break;
    default:
        $controller = new \Controllers\DefaultController();
}

$controller->Request($action);
