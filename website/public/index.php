<?php

require_once '../core/view.php';
require_once '../core/di.php';
require_once '../core/pdoAdapter.php';
require_once '../models/note.php';

session_start();

$di = new Di();
$di->adapter = PdoAdapter::getAdapter(require_once '../core/config.php');

$route = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
require_once '../views/message.php';

switch ($route[0]) 
{
    case "register":
        require_once '../views/register.php';
        break;
    case "login":
        require_once '../views/login.php';
        break;
    case "":
    case "home":
        $noteModel = new Note() ; 
        $notes = $noteModel->select_all(1);
        require_once '../views/home.php';
        break;
    case "delete":
        if (array_key_exists(1, $route)) {
            $noteModel = new Note();
            $noteModel->delete($route[1]);
            $_SESSION['message'] = 'delete success';
        }
        else {
            $_SESSION['error'] = 'delete error. Wrong Id';
        }
        header('Location: /');
        break;
    case "edit":
        $note;
        if (array_key_exists(1, $route)) {
            $noteModel = new Note() ;
            $note = $noteModel->select($route[1])[0];
            require_once '../views/edit.php';
        }
        else {
            require_once '../views/edit.php';
        }
        break;
    case "save":
        $noteModel = new Note();
        if (array_key_exists(1, $route)) {
            $noteModel->edit($route[1], $_POST['header'], $_POST['note']);
            $_SESSION['message'] = 'edit success';
        }
        else {
            $noteModel->save(1, $_POST['header'], $_POST['note']);
            $_SESSION['message'] = 'save success';
        }
        header('Location: /');
        break;
    default:
        require_once '../views/404.php';
        break;
};