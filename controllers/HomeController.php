<?php
class HomeController {
    public function index() {
        // Cargar el modelo
        require_once('models/UserModel.php');

        // Obtener datos del modelo (simulado)
        $users = UserModel::getUsers();

        // Cargar la vista
        require_once('views/home.php');
    }
}
