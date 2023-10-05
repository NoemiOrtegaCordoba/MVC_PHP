<?php
// Incluir el archivo que contiene la clase UserModel
require_once('models/UserModel.php');

// Controlador predeterminado es HomeController
$controller = 'HomeController';
require_once("controllers/{$controller}.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si la solicitud es de tipo POST

    // Obtener el ID del usuario enviado por POST
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $action = 'displayUser';

    // Crear una instancia del controlador
    $controllerInstance = new $controller();

    // Verificar si el método (acción) existe en el controlador
    if (method_exists($controllerInstance, $action)) {
        // Llamar al método (acción) del controlador
        $controllerInstance->$action($userId);
    } else {
        echo "Acción no válida";
    }
} else {
    // Si la solicitud no es de tipo POST (probablemente GET)

    // Obtener la URI de la solicitud
    $uri = $_SERVER['REQUEST_URI'];

    // Dividir la URI en segmentos usando '/'
    $segments = explode('/', trim($uri, '/'));

    // La acción se encuentra en el segundo segmento de la URI
    $action = isset($segments[2]) ? $segments[2] : 'home';

    // Crear una instancia del controlador
    $controllerInstance = new $controller();

    // Verificar si el método (acción) existe en el controlador
    if (method_exists($controllerInstance, $action)) {
        // Llamar al método (acción) del controlador
        if (isset($segments[3])) {
            $controllerInstance->$action($segments[3]);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Acción no válida";
    }
}
