<?php

require_once('Request.php');
function frontController()
{
    // Obtener la solicitud HTTP
    $request = new Request();

    // Asignar la solicitud a un controlador
    $controller = $request->getController();

    // Verificar que el controlador sea válido
    if (!class_exists($controller)) {
        echo 'El controlador no es válido.';
        exit;
    }

    // Llamar al controlador
    $controller->index();
}

// Llamada al controlador frontal
frontController();
