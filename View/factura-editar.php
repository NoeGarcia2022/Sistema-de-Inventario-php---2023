<?php
    function conexion(){
        $conexion=mysqli_connect('localhost', 'root', '', 'computacion1');
        return $conexion;
    }
?>


<h1 class="page-header">
    <?php echo $alm->idfactura != null ? $alm->num_factura : 'Factura'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Factura">Facturas</a></li>
  <li class="active"><?php echo $alm->num_factura != null ? $alm->num_factura: 'Factura'; ?></li>
</ol>


<form action="?c=Factura&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idfactura" value="<?php echo $alm->idfactura; ?>" />
    
    <div class="form-group">
        <label>Numero Factura</label>
        <input type="text" name="num_factura" value="<?php echo $alm->num_factura; ?>" class="form-control" placeholder="Ingrese el numero de factura" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" value="<?php echo $alm->fecha; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Cliente</label>

            <select class="form-control" name="idcliente" id="">
                <?php
                $con=conexion();
                #consulta de todas las categorias
                $sql = 'SELECT * FROM persona';
                $query=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_array($query)){
                    $idcliente=$row['idcliente'];
                    $nombre=$row['nombre'];
                ?>
                    <option value="<?php echo $idcliente ?>"><?php echo $nombre?> </option>  
                <?php
                }
                ?>
            </select>
        
    </div>

    
    <div class="form-group">
        <label>Venta a Cuenta de</label>
        <input type="text" name="venta_a_cuenta" value="<?php echo $alm->venta_a_cuenta; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Forma de Pago</label>
        <input type="text" name="forma_pago" value="<?php echo $alm->forma_pago; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Suma</label>
        <input type="text" name="suma" value="<?php echo $alm->suma; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Iva Retenido</label>
        <input type="text" name="iva_retenido" value="<?php echo $alm->forma_pago; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>SubTotal</label>
        <input type="text" name="subtotal" value="<?php echo $alm->subtotal; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Venta no Sujeta</label>
        <input type="text" name="venta_no_sujeta" value="<?php echo $alm->venta_no_sujeta; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Venta Exenta</label>
        <input type="text" name="venta_exenta" value="<?php echo $alm->venta_exenta; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="text" name="total" value="<?php echo $alm->total; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
