<?php
require_once 'Model/conexion.php';
$controller = 'usuario';
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
    <a class="btn btn-red" href="?c=Usuario&a=Crud">Agregar Usuario</a>
</div>

<div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-categoria.php" target="_blank">Vista de Usuario</a>
</div>

<br>

<br>

<div style="background-color: white;" class="col-9 p-4">
        <section class="text-center">
            <h1 style="background-color:#D3D3D3">Tabla Usuarios</h1>
            </section>
<table class="table table-striped table-dark table_id ">
    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Nombre</th>
            <th class="text-center" style="color:blue;">Correo</th>
            <th class="text-center" style="color:blue;">Usuario</th>
            <th class="text-center" style="color:blue;">Clave</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>

        </tr>
    </thead>
    <tbody>

    <?php foreach($this->model->Listar() as $r): ?>

        <tr>
            <td><?php echo $r->nombres; ?></td>
            <td><?php echo $r->correo; ?></td>
            <td><?php echo $r->user; ?></td>
            <td><?php echo $r->clave; ?></td>
           

            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Usuario&a=Crud&idusuario=<?php echo $r->idusuario; ?>"> Editar</a></i>
            </td>
            <td>
            <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Usuario&a=Eliminar&idusuario=<?php echo $r->idusuario; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->idusuario; ?>>Eliminar</a>
    -->
                                        </td>
            <!--<td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Persona&a=Eliminar&idcliente=<?php echo $r->idusuario; ?>'} ;" ><a href="?c=Categoria&a=Eliminar&idcategoria=<?php echo $r->idusuario; ?>"> Eliminar</a></i>
            </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    </body>
    <script src="../assets/js/buscador.js"></script>


</html>
