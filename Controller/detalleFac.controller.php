<?php
require_once 'Model/detalleFac.php';

class DetalleFacController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new DetalleFac();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/detalleFac.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new DetalleFac();
        
        if(isset($_REQUEST['id_detalle'])){
            $alm = $this->model->getting($_REQUEST['id_detalle']);
        }
        
        require_once 'View/header.php';
        require_once 'View/detalleFac-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new DetalleFac();
        
        $alm->id_detalle = $_REQUEST['id_detalle'];
        $alm->idfactura= $_REQUEST['idfactura'];
        $alm->cantidad= $_REQUEST['cantidad'];
        $alm->idproducto= $_REQUEST['idproducto'];
        $alm->precio_unitario= $_REQUEST['precio_unitario'];
        $alm->ventas_no_sujetas= $_REQUEST['ventas_no_sujetas'];
        $alm->ventas_exentas= $_REQUEST['ventas_exentas'];
        $alm->ventas_grabadas= $_REQUEST['ventas_grabadas'];
      

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->id_detalle > 0 
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
        $this->model->Eliminar($_REQUEST['id_detalle']);
        header('Location: index.php');
    }
}
