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
    <a class="btn btn-red" href="?c=DetalleFac&a=Crud">Agregar Detalles</a></div>
    <div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-deta-fac.php">Vista de Reportes</a>
</div>


<div style="background-color: white;" class="col-9 p-4">
        <section class="text-center">
            <h1 style="background-color:#D3D3D3">Tabla Detalle Factura</h1>
            </section>
<table class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Id Factura</th>
            <th class="text-center" style="color:blue;">Cantidad</th>
            <th class="text-center" style="color:blue;">Id Producto</th>
            <th class="text-center" style="color:blue;">Precio Unitario</th>
            <th class="text-center" style="color:blue;">Ventas No Sujetas</th>
            <th class="text-center" style="color:blue;">Ventas Exentas</th>
            <th class="text-center" style="color:blue;">Ventas Grabadas</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>


           

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idfactura; ?></td>
            <td><?php echo $r->cantidad; ?></td>
            <td><?php echo $r->idproducto; ?></td>
            <td><?php echo $r->precio_unitario; ?></td>
            <td><?php echo $r->ventas_no_sujetas; ?></td>
            <td><?php echo $r->ventas_exentas; ?></td>
            <td><?php echo $r->ventas_grabadas; ?></td>

            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=DetalleFac&a=Crud&id_detalle=<?php echo $r->id_detalle; ?>"> Editar</a></i>
            </td>
            <td>
            <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=DetalleFac&a=Eliminar&id_detalle=<?php echo $r->id_detalle; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->id_detalle; ?>>Eliminar</a>
    -->
                                        </td>
            <!--<td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><a href="?c=DetalleFac&a=Eliminar&id_detalle=<?php echo $r->id_detalle; ?>"> Eliminar</a></i>
            </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    </body>
</html>
