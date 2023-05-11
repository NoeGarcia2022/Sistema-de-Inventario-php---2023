<?php
require_once 'Model/comprobante.php';

class ComprobanteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Comprobante();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/comprobante.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Comprobante();
        
        if(isset($_REQUEST['idcomprobante'])){
            $alm = $this->model->getting($_REQUEST['idcomprobante']);
        }
        
        require_once 'View/header.php';
        require_once 'View/comprobante-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Comprobante();
        
        $alm->idcomprobante = $_REQUEST['idcomprobante'];
        $alm->giro= $_REQUEST['giro'];
        $alm->condiciones_operacion= $_REQUEST['condiciones_operacion'];
        $alm->venta_a_cuenta= $_REQUEST['venta_a_cuenta'];
        $alm->numero_remision= $_REQUEST['numero_remision'];
        $alm->fecha_remision= $_REQUEST['fecha_remision'];
        $alm->sumas= $_REQUEST['sumas'];
        $alm->iva= $_REQUEST['iva'];
        $alm->subtotal= $_REQUEST['subtotal'];
        $alm->ventas_exenta= $_REQUEST['ventas_exenta'];
        $alm->venta_no_sujetas= $_REQUEST['venta_no_sujetas'];
        $alm->iva_retenido= $_REQUEST['iva_retenido'];
        $alm->venta_total= $_REQUEST['venta_total'];
      

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idcomprobante > 0 
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
        $this->model->Eliminar($_REQUEST['idcomprobante']);
        header('Location: index.php');
    }
}