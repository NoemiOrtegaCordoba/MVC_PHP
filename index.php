<?php
require_once('models/UserModel.php');

$controller = 'HomeController';
require_once("controllers/{$controller}.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del usuario enviado por POST
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $action = 'displayUser';

    $controllerInstance = new $controller();

    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action($userId);
    } else {
        echo "Acción no válida";
    }
} else {
    // Resto de la lógica para manejar GET aquí
    $uri = $_SERVER['REQUEST_URI'];
    $segments = explode('/', trim($uri, '/'));

    $action = isset($segments[2]) ? $segments[2] : 'home';

    $controllerInstance = new $controller();

    if (method_exists($controllerInstance, $action)) {
        if (isset($segments[3])) {
            $controllerInstance->$action($segments[3]);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Acción no válida";
    }
}
