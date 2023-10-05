<?php
// Definición de la clase HomeController
class HomeController
{
    // Modelo de usuario
    private $userModel;

    // Constructor, inicializa el modelo de usuario
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Método para mostrar la página de inicio
    public function home()
    {
        require_once('views/home.php');
    }

    // Método para mostrar la página "Acerca de"
    public function about()
    {
        require_once('views/about.php');
    }

    // Método para mostrar detalles de un usuario específico por su ID
    public function displayUser($userId)
    {
        // Verificar si se proporcionó un ID de usuario
        if ($userId !== null) {
            // Obtener el usuario por su ID utilizando el modelo de usuario
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
