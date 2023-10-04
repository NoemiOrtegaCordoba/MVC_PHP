<?php
// Cargar dependencias y configuraciones necesarias

// Analizar la URL para determinar la acción y los parámetros
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));

// Determinar el controlador y la acción
$controller = isset($segments[0]) ? $segments[0] : 'home'; // Controlador predeterminado si no se proporciona
$action = isset($segments[1]) ? $segments[1] : 'index'; // Acción predeterminada si no se proporciona

// Incluir el controlador correspondiente
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
