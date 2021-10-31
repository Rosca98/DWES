<?php
require_once("controllers/resourceController.php");
require_once("controllers/userController.php");
require_once("controllers/timeslotsController.php");
require_once("controllers/reservationController.php");

// Miramos a ver si hay alguna accion pendiente de realizar
session_start();
if (!isset($_REQUEST['action'])) {
// No la hay. Usamos la accion por defecto (mostrar el formulario de login)
    $action = "showLoginForm";
} else {
// Si la hay. La recuperamos.
    $action = $_REQUEST['action'];
}

// Miramos a ver si hay algun controlador pendiente de realizar
if (!isset($_REQUEST['controller'])) {
    // No lo hay. Usamos la accion por defecto
        $controller = "userController";
    } else {
    // Si lo hay. La recuperamos.
        $controller = $_REQUEST['controller'];
    }
    
    //Creamos el controlador
    $controller = new $controller();
    
    // Ejecutamos el metodo del controlador que se llame como la accion
    $controller->$action();