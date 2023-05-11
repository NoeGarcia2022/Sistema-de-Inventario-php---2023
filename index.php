<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo'
    <script>
            alert("Por favor debes iniciar sesion");
            window.location = "Login/index2.php";    
    </script>
';
    
   session_destroy();
   die();
}


?>

<?php
require_once 'Model/conexion.php';
$controller = 'Persona';

// Con esta sección hacemos el Controlador del Frontend
if(!isset($_REQUEST['c']))
{
    require_once "Controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // buscamos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    

    // Instanciamos el controlador
    require_once "Controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Función para llamar las acciones a ejecutar
    call_user_func( array( $controller, $accion ) );
}

?>
