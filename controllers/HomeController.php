<?php
require_once('models/UserModel.php');

class HomeController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        require_once('views/home.php');
    }

    public function about() {
        require_once('views/about.php');
    }

    public function displayUser($userId) {
        $user = $this->userModel->getUserById($userId);
        if ($user) {
            echo "Usuario ID: {$user['id']}, Nombre: {$user['name']}";
        } else {
            echo "Usuario no encontrado";
        }
    }
}
