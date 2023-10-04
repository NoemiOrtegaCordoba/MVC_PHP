<?php
class HomeController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function home() {
        require_once('views/home.php');
    }

    public function about() {
        require_once('views/about.php');
    }

    public function displayUser($userId) {
        if ($userId !== null) {
            $user = $this->userModel->getUserById($userId);
            if ($user) {
                echo "Usuario ID: {$user['id']}, Nombre: {$user['name']}";
            } else {
                echo "Usuario no encontrado";
            }
        } else {
            echo "No se proporcionó un ID de usuario.";
        }
    }
}
