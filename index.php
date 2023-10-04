<?php
// Analizar la URL para determinar la acción
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));

// Determinar la acción
$action = isset($segments[2]) ? $segments[2] : 'index'; // Acción predeterminada si no se proporciona

// Incluir el controlador correspondiente (HomeController si no se especifica)
$controller = isset($segments[1]) ? $segments[1] : 'home';
$controllerFile = "controllers/{$controller}Controller.php";

if (file_exists($controllerFile)) {
    require_once($controllerFile);

    // Crear una instancia del controlador y llamar a la acción
    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerInstance = new $controllerClass();

    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        // Manejar la acción no encontrada
        echo "Acción no válida";
    }
} else {
    // Manejar el controlador no encontrado
    echo "Controlador no encontrado";
}
