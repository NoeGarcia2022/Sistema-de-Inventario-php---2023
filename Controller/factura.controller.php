<?php
require_once 'Model/factura.php';

class FacturaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Factura();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/factura.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Factura();
        
        if(isset($_REQUEST['idfactura'])){
            $alm = $this->model->getting($_REQUEST['idfactura']);
        }
        
        require_once 'View/header.php';
        require_once 'View/factura-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Factura();
        
        $alm->idfactura = $_REQUEST['idfactura'];
        $alm->num_factura = $_REQUEST['num_factura'];
        $alm->fecha = $_REQUEST['fecha'];
        $alm->idcliente = $_REQUEST['idcliente'];
        $alm->venta_a_cuenta = $_REQUEST['venta_a_cuenta'];
        $alm->forma_pago = $_REQUEST['forma_pago'];
        $alm->suma = $_REQUEST['suma'];
        $alm->iva_retenido = $_REQUEST['iva_retenido'];
        $alm->subtotal = $_REQUEST['subtotal'];
        $alm->venta_no_sujeta = $_REQUEST['venta_no_sujeta'];
        $alm->venta_exenta = $_REQUEST['venta_exenta'];
        $alm->total= $_REQUEST['total'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idfactura> 0 
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
        $this->model->Eliminar($_REQUEST['idfactura']);
        header('Location: index.php');
    }
}
