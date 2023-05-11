<?php
require_once 'Model/producto.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/producto.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Producto();
        
        if(isset($_REQUEST['idproducto'])){
            $alm = $this->model->getting($_REQUEST['idproducto']);
        }
        
        require_once 'View/header.php';
        require_once 'View/producto-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Producto();
        
        $alm->idproducto = $_REQUEST['idproducto'];
        $alm->descripcion = $_REQUEST['Descripcion'];
        $alm->idcategoria = $_REQUEST['idcategoria'];
        $alm->precio_unitario = $_REQUEST['precio_unitario'];
        $alm->existencia = $_REQUEST['existencia'];
        $alm->total = $_REQUEST['total'];
        $alm->imagen = $_REQUEST['imagen'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->idproducto > 0 
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
        $this->model->Eliminar($_REQUEST['idproducto']);
        header('Location: index.php');
    }
}
