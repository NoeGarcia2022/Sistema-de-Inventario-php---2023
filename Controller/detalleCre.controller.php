<?php
require_once 'Model/detalleCre.php';

class DetalleCreController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new DetalleCre();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/detalleCre.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new DetalleCre();
        
        if(isset($_REQUEST['id_detalleCre'])){
            $alm = $this->model->getting($_REQUEST['id_detalleCre']);
        }
        
        require_once 'View/header.php';
        require_once 'View/detalleCre-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new DetalleCre();
        
        $alm->id_detalleCre = $_REQUEST['id_detalleCre'];
        $alm->cantidad= $_REQUEST['cantidad'];
        $alm->descripcion= $_REQUEST['descripcion'];
        $alm->precioUnitario= $_REQUEST['precioUnitario'];
        $alm->ventas_exentas= $_REQUEST['ventas_exentas'];
        $alm->ventas_no_sujetas= $_REQUEST['ventas_no_sujetas'];
        $alm->ventas_grabadas= $_REQUEST['ventas_grabadas'];
        $alm->idproducto= $_REQUEST['idproducto'];
      

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->id_detalleCre > 0 
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
        $this->model->Eliminar($_REQUEST['id_detalleCre']);
        header('Location: index.php');
    }
}
