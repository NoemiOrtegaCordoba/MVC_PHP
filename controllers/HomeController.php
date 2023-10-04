<?php
class HomeController {
    public function index() {
        require_once('views/home.php');
    }

    public function about() {
        require_once('views/about.php');
    }
}
