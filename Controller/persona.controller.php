<?php
require_once 'Model/persona.php';

class PersonaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Persona();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/persona.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Persona();
        
        if(isset($_REQUEST['idcliente'])){
            $alm = $this->model->getting($_REQUEST['idcliente']);
        }
        
        require_once 'View/header.php';
        require_once 'View/persona-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Persona();
        
        $alm->idcliente = $_REQUEST['idcliente'];
        $alm->nombre = $_REQUEST['Nombres'];
        $alm->apellido = $_REQUEST['Apellido'];
        $alm->nrc = $_REQUEST['nrc'];
        $alm->municipio = $_REQUEST['municipio'];
        $alm->direccion = $_REQUEST['direccion'];
        $alm->telefono = $_REQUEST['telefono'];
        $alm->email = $_REQUEST['email'];
        $alm->giro = $_REQUEST['giro'];
        $alm->DUI = $_REQUEST['dui'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idcliente > 0 
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
        $this->model->Eliminar($_REQUEST['idcliente']);
        header('Location: index.php');
    }
}
