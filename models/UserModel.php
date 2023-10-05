<?php
// Definición de la clase UserModel
class UserModel {
    // Array asociativo que simula datos de usuarios (id, nombre)
    private $users = [
        1 => ['id' => 1, 'name' => 'Usuario 1'],
        2 => ['id' => 2, 'name' => 'Usuario 2'],
        3 => ['id' => 3, 'name' => 'Usuario 3']
    ];

    // Método para obtener un usuario por su ID
    public function getUserById($id) {
        // Verificar si el ID del usuario existe en el array de usuarios
        // Si existe, devuelve la información del usuario; de lo contrario, devuelve null
        return isset($this->users[$id]) ? $this->users[$id] : null;
    }
}
