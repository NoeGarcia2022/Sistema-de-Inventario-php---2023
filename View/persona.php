<!DOCTYPE html>
<html lang="en">
<head>
<style>
th, td {
  border-style:solid;
  border-color: gray;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas Clientes</title>
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



<!--<h1 class="page-header">Clientes</h1>-->
   
<!--<div class="well well-sm text-right">-->
    <div class="text-right">
    <a class="btn btn-red" href="?c=Persona&a=Crud">Agregar Clientes</a>
</div>

<div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-cliente.php" target="_blank">Vista de Reportes</a>
</div>
<!--<div class="well well-sm text-right">
    <a class="btn btn-primary" href="index.php?c=Categoria">Agregar Categoria</a>
</div>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="index.php?c=Producto">Agregar Productos</a>
</div>-->
<div style="background-color: white;" class="col-9 p-4">
<section class="text-center">
    <h1 style="background-color:#D3D3D3">Tabla Cliente</h1>
</section>
<table class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Nombres</th>
            <th class="text-center" style="color:blue;">Apellido</th>
            <th class="text-center" style="color:blue;">NRC</th>
            <th class="text-center" style="color:blue;">Municipio</th>
            <th class="text-center" style="color:blue;">Direccion</th>
            <th class="text-center" style="color:blue;">Telefono</th>
            <th class="text-center" style="color:blue;">Email</th>
            <th class="text-center" style="color:blue;">Giro</th>
            <th class="text-center" style="color:blue;">DUI</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>

        </tr>
    </thead>
    <tbody>

    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellido; ?></td>
            <td><?php echo $r->nrc; ?></td>
            <td><?php echo $r->municipio; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->giro; ?></td>
            <td><?php echo $r->DUI; ?></td>

            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Persona&a=Crud&idcliente=<?php echo $r->idcliente; ?>"> Editar</a></i>
            </td>
            <td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Persona&a=Eliminar&idcliente=<?php echo $r->idcliente; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->idcliente; ?>>Eliminar</a>
    -->
                                        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    
</body>
</html>
