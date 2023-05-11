<?php
require_once 'Model/conexion.php';
$controller = 'categoria';
?>

<!DOCTYPE html>
<html>
<head>
<style>
th, td {
  border-style:solid;
  border-color: gray;
}
</style>
</head>
<body>

<script type="text/javascript">
    function check_eliminar(){
        if(confirm('Esta seguro que desea eliminar?')){
            return true;
        }else{
            return false;
        }
    }
</script>


<!--<h1 class="page-header">Categorias</h1>-->


<div class="text-right">
    <a class="btn btn-red" href="?c=Categoria&a=Crud">Agregar Categoria</a>
</div>

<div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-categoria.php" target="_blank">Vista de Reportes</a>
</div>

<div style="background-color: white;" class="col-9 p-4">
        <section class="text-center">
            <h1 style="background-color:#D3D3D3">Tabla Categoria</h1>
            </section>
<table class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Nombre Categoria</th>
            <th class="text-center" style="color:blue;">Descripcion</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>
           

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nom_categoria; ?></td>
            <td><?php echo $r->descripcion; ?></td>

            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Categoria&a=Crud&idcategoria=<?php echo $r->idcategoria; ?>"> Editar</a></i>
            </td>
            <td>
            <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Categoria&a=Eliminar&idcategoria=<?php echo $r->idcategoria; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->idcategoria; ?>>Eliminar</a>
    -->
                                        </td>
            <!--<td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Persona&a=Eliminar&idcliente=<?php echo $r->idcliente; ?>'} ;" ><a href="?c=Categoria&a=Eliminar&idcategoria=<?php echo $r->idcategoria; ?>"> Eliminar</a></i>
            </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    </body>
</html>
