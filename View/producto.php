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
<!--<h1 class="page-header">Productos</h1>-->


<div class="text-right">
    <a class="btn btn-red" href="?c=Producto&a=Crud">Agregar Productos</a>
</div>
<div class="text-right">
    <a class="btn btn-red" href="Reportes/reporte-produc.php" target=_blank >Vista de Reportes</a>
</div>

<div style="background-color: white;" class="col-9 p-4">
        <section class="text-center">
            <h1 style="background-color:#D3D3D3">Tabla Productos</h1>
            </section>
<table class="table table-striped" style="width:100%">

    <thead>
        <tr>
            <th class="text-center" style="color:blue;">Descripcion</th>
            <th class="text-center" style="color:blue;">Id Categoria</th>
            <th class="text-center" style="color:blue;">Precio Unitario</th>
            <th class="text-center" style="color:blue;">Existencia</th>
            <th class="text-center" style="color:blue;">Total</th>
            <th class="text-center" style="color:blue;">Imagen</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            <th class="text-center" style="color:blue;">Acciones</th>
            
        

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->idcategoria; ?></td>
            <td><?php echo $r->precio_unitario; ?></td>
            <td><?php echo $r->existencia; ?></td>
            <td><?php echo $r->total; ?></td>
            <td><?php echo $r->imagen; ?></td>

            <td>
                <i class="glyphicon glyphicon-edit"><a  href="?c=Producto&a=Crud&idproducto=<?php echo $r->idproducto; ?>"> Editar</a></i>
            </td>
            <td>
            <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><input type="button" value='Eliminar' onclick="if (check_eliminar()) { window.location='?c=Producto&a=Eliminar&idproducto=<?php echo $r->idproducto; ?>'} ;" > </i>
                                          <!--      "?c=Persona&a=Eliminar&idcliente=<?php echo $r->idproducto; ?>>Eliminar</a>
    -->
                                        </td>
            <!--<td>
                <i class="glyphicon glyphicon-remove" style="font-size: 18px; color:red;"><a href="?c=Producto&a=Eliminar&idproducto=<?php echo $r->idproducto; ?>"> Eliminar</a></i>
            </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

    </body>
</html>
