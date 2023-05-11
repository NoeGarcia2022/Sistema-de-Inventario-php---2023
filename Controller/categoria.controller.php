<?php
require_once 'Model/categoria.php';

class CategoriaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Categoria();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/categoria.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Categoria();
        
        if(isset($_REQUEST['idcategoria'])){
            $alm = $this->model->getting($_REQUEST['idcategoria']);
        }
        
        require_once 'View/header.php';
        require_once 'View/categoria-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Categoria();
        
        $alm->idcategoria = $_REQUEST['idcategoria'];
        $alm->nom_categoria = $_REQUEST['nombre'];
        $alm->descripcion = $_REQUEST['descripcion'];
      

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idcategoria > 0 
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
        $this->model->Eliminar($_REQUEST['idcategoria']);
        header('Location: index.php');
    }
}
