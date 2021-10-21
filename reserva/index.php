<?php
require_once("controllers/resourceController.php");

// Miramos a ver si hay alguna accion pendiente de realizar
if (!isset($_REQUEST['action'])) {
// No la hay. Usamos la accion por defecto (mostrar el formulario de login)
    $action = "showResourcesList";
} else {
// Si la hay. La recuperamos.
    $action = $_REQUEST['action'];
}

//Creamos el controlador
$controller = new resourceController();

// Ejecutamos el metodo del controlador que se llame como la accion
$controller->$action();