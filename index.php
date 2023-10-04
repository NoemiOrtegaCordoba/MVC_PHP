<?php
// Analizar la URL para determinar el controlador y la acción
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));

// Determinar el controlador y la acción
//$controller = isset($segments[3]) ? ucfirst($segments[3]) . 'Controller' : 'HomeController';
$action = isset($segments[2]) ? $segments[2] : 'index';

// Incluir el controlador correspondiente
require_once("controllers/HomeController.php");

// Crear una instancia del controlador y llamar a la acción
$controllerInstance = new HomeController();

if (method_exists($controllerInstance, $action)) {
    $controllerInstance->$action();
} else {
    echo "Acción no válida";
}
