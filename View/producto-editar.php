<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.button {
  background-color: aqua; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {font-size: 12px;}
</style>
</head>

<body>
    
<?php
    function conexion(){
        $conexion=mysqli_connect('localhost', 'root', '', 'computacion1');
        return $conexion;
    }
?>


<h1 class="page-header">
    <?php echo $alm->idproducto != null ? $alm->descripcion : 'Nuevo Producto'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Producto">Productos</a></li>
  <li class="active"><?php echo $alm->idproducto != null ? $alm->descripcion : 'Nuevo Producto'; ?></li>
</ol>

<form enctype="multipart/form-data" action="?c=Producto&a=Crud" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
   <p> Enviar mi archivo: <input name="subir_archivo"  button class="button button1" type="file" /></p>
   <p> <input type="submit" button class="button button1" value="Subir Imagen" /></p>
</form>
<?php
 $imagensubida="";
$subir_archivo="";
if (isset($_FILES['subir_archivo']))
{
$directorio = 'uploads/';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
echo "<div>";
if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
      echo "El archivo es válido y se cargó correctamente.<br><br>";
	   $imagensubida="<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
    } else {
       echo "La subida ha fallado";
    }
    echo "</div>";
}
?>


<form action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idproducto" value="<?php echo $alm->idproducto; ?>" />
    
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="Descripcion" value="<?php echo $alm->descripcion; ?>" class="form-control" placeholder="Ingrese la descripcion del producto" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Id Categoria</label>
        <input type="text" name="idcategoria" value="<?php echo $alm->idcategoria; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Precio Unitario</label>
        <input type="text" name="precio_unitario" id="precio_unitario" value="0" onchange="total.value=parseFloat(existencia.value)*parseFloat(precio_unitario.value);" <?php echo $alm->precio_unitario; ?>" class="form-control" placeholder="Igrese el precio unitario" data-validacion-tipo="requerido|date" />
    </div>
    
    <div class="form-group">
        <label>Existencia</label>
        <input type="text" name="existencia" id="existencia" value="0" onchange="total.value=parseFloat(existencia.value)*parseFloat(precio_unitario.value);" <?php echo $alm->existencia; ?>" class="form-control" placeholder="Ingrese existencia del producto " data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Total</label>
        <input type="text" name="total" id="total" readonly="true" value="<?php echo $alm->total; ?>" class="form-control" placeholder="Ingrese total del producto" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Imagen</label>
        <?php echo $imagensubida; ?>
        <input type="text" name="imagen" readonly value="<?php echo $subir_archivo; //echo $alm->imagen; ?>" class="form-control" placeholder=""  />
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Categoria</label>

            <select class="form-control" name="categorias" id="">
                <?php
                $con=conexion();
                #consulta de todas las categorias
                $sql = 'SELECT * FROM categorias';
                $query=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_array($query)){
                    $idcategoria=$row['idcategoria'];
                    $descripcion=$row['descripcion'];
                ?>
                    <option value="<?php echo $idcategoria ?>"><?php echo $descripcion?> </option>  
                <?php
                }
                ?>
            </select>
        
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

</body>
</html>
