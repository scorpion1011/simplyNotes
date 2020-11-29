<?php

require_once '../core/view.php';
require_once '../core/di.php';
require_once '../core/pdoAdapter.php';
require_once '../models/note.php';

$di = new Di();
$di->adapter = PdoAdapter::getAdapter(require_once '../core/config.php');

switch ($_SERVER['REQUEST_URI']) 
{
    case "/register":
        require_once '../views/register.php';
        break;
    case "/login":
        require_once '../views/login.php';
        break;
    case "/home":
        $noteModel = new Note() ; 
        $notes = $noteModel->select(1);
        
//         $note1 = (object)["header" => "header1", "body" => "body1"];
//         $note2 = (object)["header" => "header2", "body" => "body2"];
//         $notes = [$note1, $note2];
        require_once '../views/home.php';
        break;
    default:
        require_once '../views/404.php';
        break;
}
