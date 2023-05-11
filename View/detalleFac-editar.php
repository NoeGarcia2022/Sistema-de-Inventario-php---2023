<?php
    function conexion(){
        $conexion=mysqli_connect('localhost', 'root', '', 'computacion1');
        return $conexion;
    }

?>

<h1 class="page-header">
    <?php echo $alm->id_detalle!= null ? $alm->idfactura : 'Nuevo Detalle Factura'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=DetalleFac">Detalles</a></li>
  <li class="active"><?php echo $alm->id_detalle!= null ? $alm->idfactura : 'Nuevo Detalle'; ?></li>
</ol>

<form action="?c=DetalleFac&a=Guardar" method="post" enctype="multipart/form-data" name="formFacDetEditar">
    <input type="hidden" name="id_detalle" value="<?php echo $alm->id_detalle; ?>" />
    
    <div class="form-group">
    <label for="exampleInputEmail1" class="form-label"> Id Factura</label>

<select class="form-control" name="idfactura" id="">
    <?php
    $con=conexion();
    #consulta de todas las categorias
    $sql = 'SELECT * FROM  factura';
    $query=mysqli_query($con,$sql);
    while ($row=mysqli_fetch_array($query)){
        $idfactura=$row['idfactura'];
        $num_factura=$row['num_factura'];
    ?>
        <option value="<?php echo $idfactura ?>"><?php echo $num_factura?> </option>  
    <?php
    }
    ?>
</select>
    </div>
    
    <div class="form-group">
        <label>Cantidad</label>
        <input type="text" name="cantidad"  id="cantidad" value="0" onchange="ventas_grabadas.value=parseFloat(cantidad.value)*parseFloat(precio_unitario.value);"<?php echo $alm->cantidad; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1" class="form-label"> Productos</label>

<select class="form-control" name="idproducto" id="idproducto">
    <?php
    $con=conexion();
    #consulta de todas las categorias
    $sql = 'SELECT * FROM  productos';
    $query=mysqli_query($con,$sql);
    while ($row=mysqli_fetch_array($query)){
        $idproducto=$row['idproducto'];
        $descripcion=$row['descripcion'];
    ?>
        <option value="<?php echo $idproducto ?>"><?php echo  $descripcion?> </option>  
    <?php
    }
    ?>
  
</select>
    </div>
    
  
    <div class="form-group">
        <label>Precio Unitario</label>
        <input type="text" name="precio_unitario" name="resultados" id="precio_unitario" value="<?php ?>" onchange="ventas_grabadas.value=parseFloat(cantidad.value)*parseFloat(precio_unitario.value);" <?php echo $alm->precio_unitario; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Ventas No Sujetas</label>
        <input type="text" name="ventas_no_sujetas" value="<?php echo $alm->ventas_no_sujetas; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Ventas Exentas</label>
        <input type="text" name="ventas_exentas" value="<?php echo $alm->ventas_exentas; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Ventas Grabadas</label>
        <input type="text" name="ventas_grabadas"  readonly="true" value="<?php echo $alm->ventas_grabadas; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
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
