<?php
require_once 'Model/inicio.php';

class InicioController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Inicio();
    }

    public function Index(){
        require_once 'View/header.php';
        require_once 'View/inicio.php';
        require_once 'View/footer.php';
    }
}