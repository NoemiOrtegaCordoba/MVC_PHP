<?php

class Request
{
    public function getController()
    {
        // Verificar si la clave REQUEST_URI existe
        if (!isset($_SERVER['REQUEST_URI'])) {
            return 'Home';
        }

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Eliminar el prefijo
        $uri = ltrim($uri, '/');

        // Obtener el controlador
        $controller = explode('/', $uri)[0];

        return $controller;
    }

    public function getAction()
    {
        return 'index';
    }
}
