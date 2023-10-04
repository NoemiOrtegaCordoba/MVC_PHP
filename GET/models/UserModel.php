<?php
class UserModel {
    private $users = [
        1 => ['id' => 1, 'name' => 'Usuario 1'],
        2 => ['id' => 2, 'name' => 'Usuario 2'],
        3 => ['id' => 3, 'name' => 'Usuario 3']
    ];

    public function getUserById($id) {
        return isset($this->users[$id]) ? $this->users[$id] : null;
    }
}
