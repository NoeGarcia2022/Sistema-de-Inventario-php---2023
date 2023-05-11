<?php
require_once 'Model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/usuario.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Usuario();
        
        if(isset($_REQUEST['idusuario'])){
            $alm = $this->model->getting($_REQUEST['idusuario']);
        }
        
        require_once 'View/header.php';
        require_once 'View/usuario-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Usuario();
        
        $alm->idusuario= $_REQUEST['idusuario'];
        $alm->nombres = $_REQUEST['nombres'];
        $alm->correo= $_REQUEST['correo'];
        $alm->user= $_REQUEST['user1'];
        $alm->clave= $_REQUEST['clave'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idusuario > 0 
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->idpersona > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idusuario']);
        header('Location: index.php');
    }
}