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
<!--<h1 class="page-header">Factura</h1>-->


<div class="text-right">
    <a class="btn btn-tomate" href="?c=Comprobante&a=Crud">Agregar Comprobante</a>
</div>
<div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-comprob.php">Vista de Reportes</a>
</div>

<div style="background-color: white;" class="col-9 p-4">
<section class="text-center">
    <h1 style="background-color: #D3D3D3">Tabla Comprobante</h1>
</section>
<table class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Giro</th>
            <th class="text-center" style="color:blue;">Condiciones Operaciones</th>
            <th class="text-center" style="color:blue;">Venta a Cuenta </th>
            <th class="text-center" style="color:blue;">Numero de Remision</th>
            <th class="text-center" style="color:blue;">Fecha Remision</th>
            <th class="text-center" style="color:blue;">Sumas</th>
            <th class="text-center" style="color:blue;">Iva</th>
            <th class="text-center" style="color:blue;">SubTotal</th>
            <th class="text-center" style="color:blue;">Venta exenta</th>
            <th class="text-center" style="color:blue;">Venta no sujeta</th>
            <th class="text-center" style="color:blue;">Venta Total</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->giro; ?></td>
            <td><?php echo $r->condiciones_operacion; ?></td>
            <td><?php echo $r->venta_a_cuenta; ?></td>
            <td><?php echo $r->numero_remision; ?></td>
            <td><?php echo $r->fecha_remision; ?></td>
            <td><?php echo $r->sumas; ?></td>
            <td><?php echo $r->iva; ?></td>
            <td><?php echo $r->subtotal; ?></td>
            <td><?php echo $r->ventas_exenta; ?></td>
            <td><?php echo $r->venta_no_sujetas; ?></td>
            <td><?php echo $r->venta_total; ?></td>
            


            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Comprobante&a=Crud&idcomprobante=<?php echo $r->idcomprobante; ?>"> Editar</a></i>
            </td>
            <td>
            <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Comprobante&a=Eliminar&idcomprobante=<?php echo $r->idcomprobante; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->idcomprobante; ?>>Eliminar</a>
    -->
                                        </td>
            <!--<td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><a href="?c=Comprobante&a=Eliminar&idcomprobante=<?php echo $r->idcomprobante; ?>"> Eliminar</a></i>
            </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    </body>
</html>
