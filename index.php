<?php
session_start();
require_once('autoload.php');
require_once('config/db.php');
require_once('config/parameters.php');
require_once('helpers/utilities.php');

function showError()
{
    $error = new ErrorController();
    $error->peticion();
}

if (isset($_GET['controller'])) {
    $nameController = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nameController = ControllerDefault;
} else {
    showError();
}

if (class_exists($nameController)) {
    $controlador = new $nameController();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $actionDefault = ActionDefault;
        $controlador->$actionDefault();
    } else {
        showError();
    }
} else {
    showError();
}
