<?php
// Analizar la URL para determinar el controlador y la acción
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
var_dump($segments);
// Determinar el controlador y la acción
$controller = 'HomeController';
$action = isset($segments[2]) ? $segments[2] : 'home';

// Incluir el controlador correspondiente
require_once("controllers/{$controller}.php");

// Crear una instancia del controlador y llamar a la acción
$controllerInstance = new $controller();

if (method_exists($controllerInstance, $action)) {
    // Llamar a la acción con el parámetro adicional si es necesario
    if (isset($segments[2])) {
        $controllerInstance->$action($segments[2]);
    } else {
        $controllerInstance->$action(null);
    }
} else {
    echo "Acción no válida";
}
