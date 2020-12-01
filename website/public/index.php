<?php

require_once '../core/view.php';
require_once '../core/di.php';
require_once '../core/pdoAdapter.php';
require_once '../models/note.php';
require_once '../models/user.php';

session_start();

$di = new Di();
$di->adapter = PdoAdapter::getAdapter(require_once '../core/config.php');

$route = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

switch ($route[0]) 
{
    case "register":
        require_once '../views/register.php';
        break;
    case "registeruser":
        $userModel = new User() ;
        $userModel->loadData($_POST);
        if ($userModel->validate()) {
            $userId = $userModel->save();
            $_SESSION['user'] = $userId;
            header('Location: /');
        }
        else {
            header('Location: /register');
        }
        break;
    case "login":
        require_once '../views/login.php';
        break;
    case "logout":
        unset($_SESSION['user']);
        header('Location: /');
        break;
    case "loginuser":
        $userModel = new User();
        $userModel->loadData($_POST);
        $user = $userModel->select();
        if (array_key_exists(0, $user))
        {
            $_SESSION['user'] = $user[0]['Id'];
            header('Location: /');
        }
        else {
            $_SESSION['error'] = 'wrong credentials';
            header('Location: /login');
        }
        break;
    case "":
    case "home":
        if (array_key_exists('user', $_SESSION)) {
            $noteModel = new Note($_SESSION['user']) ;
            $notes = $noteModel->select_all();
            require_once '../views/home.php';
        }
        else {
            header('Location: /login');
        }
        break;
    case "delete":
        if (array_key_exists(1, $route)) {
            $noteModel = new Note($_SESSION['user']);
            $noteModel->setId($route[1]);
            $noteModel->loadData($_POST);
            $noteModel->delete();
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
            $noteModel = new Note($_SESSION['user']);
            $noteModel->loadData($_POST);
            $noteModel->setId($route[1]);
            $note = $noteModel->select()[0];
        }
        require_once '../views/edit.php';
        break;
    case "save":
        $noteModel = new Note($_SESSION['user']);
        $noteModel->loadData($_POST);
        if (array_key_exists(1, $route)) {
            $noteModel->setId($route[1]);
            $_SESSION['message'] = 'edit success';
        }
        else {
            $_SESSION['message'] = 'insert success';
        }
        $noteModel->save();
        header('Location: /');
        break;
    default:
        require_once '../views/404.php';
        break;
};