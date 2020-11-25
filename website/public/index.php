<?php

require_once '../core/view.php';
require_once '../core/di.php';
require_once '../core/pdoAdapter.php';

$di = new Di();
$di->adapter = PdoAdapter::getAdapter(require_once '../core/config.php');
include '../controllers/controller_404.php';
echo $_SERVER['REQUEST_URI'];
switch ($_SERVER['REQUEST_URI']) 
{
    case "/register":
        show_register();
        break;
    case "/login":
        require_once '../views/login.php';
        break;
    case "/home":
        show_home();
        break;
    default:
        require_once '../views/404.php';
        break;
}

function show_register() {
    echo "register";
    
}

function show_login() {
    echo "login";
    
}

function show_home() {
    //$this->view->generate('main_view.php', 'template_view.php');
    //require_once("page404.php");
}

function show_not_found() {
    $controller = new Controller_404;
    $action = "action_index";
    
    if(method_exists($controller, $action))
    {
        $controller->$action();
    }
    else
    {
        echo "fail";
    }
}
