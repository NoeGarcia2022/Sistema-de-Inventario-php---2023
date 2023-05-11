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
    <a class="btn btn-tomate" href="?c=Factura&a=Crud">Agregar Factura</a>
</div>
<div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-fac.php" target="_blank">Vista de Reportes</a>
</div>

<div style="background-color: white;" class="col-9 p-4">
<section class="text-center">
    <h1 style="background-color: #D3D3D3">Tabla Factura</h1>
</section>
<table class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Numero de Factura</th>
            <th class="text-center" style="color:blue;">Fecha de factura</th>
            <th class="text-center" style="color:blue;">Id del cliente</th>
            <th class="text-center" style="color:blue;">Venta a Cuenta</th>
            <th class="text-center" style="color:blue;">Forma de pago</th>
            <th class="text-center" style="color:blue;">Suma</th>
            <th class="text-center" style="color:blue;">Iva retenido</th>
            <th class="text-center" style="color:blue;">SubTotal</th>
            <th class="text-center" style="color:blue;">Venta no suejta</th>
            <th class="text-center" style="color:blue;">Venta exenta</th>
            <th class="text-center" style="color:blue;">Total</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->num_factura; ?></td>
            <td><?php echo $r->fecha; ?></td>
            <td><?php echo $r->idcliente; ?></td>
            <td><?php echo $r->venta_a_cuenta; ?></td>
            <td><?php echo $r->forma_pago; ?></td>
            <td><?php echo $r->suma; ?></td>
            <td><?php echo $r->iva_retenido; ?></td>
            <td><?php echo $r->subtotal; ?></td>
            <td><?php echo $r->venta_no_sujeta; ?></td>
            <td><?php echo $r->venta_exenta; ?></td>
            <td><?php echo $r->total; ?></td>
            


            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Factura&a=Crud&idfactura=<?php echo $r->idfactura; ?>"> Editar</a></i>
            </td>
            <td>
            <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Factura&a=Eliminar&idfactura=<?php echo $r->idfactura; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->idfactura; ?>>Eliminar</a>
    -->
                                        </td>
            <!--<td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><a href="?c=Factura&a=Eliminar&idfactura=<?php echo $r->idfactura; ?>"> Eliminar</a></i>
            </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    </body>
</html>
