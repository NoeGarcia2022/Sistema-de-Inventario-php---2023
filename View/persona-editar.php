<h1 class="page-header">
    <?php echo $alm->idcliente != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Persona">Clientes</a></li>
  <li class="active"><?php echo $alm->idcliente != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Persona&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idcliente" value="<?php echo $alm->idcliente; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombres" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre " data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $alm->apellido; ?>" class="form-control" placeholder="Ingrese su Apellido" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>NRC</label>
        <input type="text" name="nrc" value="<?php echo $alm->nrc; ?>" class="form-control" placeholder=" Numero de registro IVA" data-validacion-tipo="requerido|date" />
    </div>
    
    <div class="form-group">
        <label>Municipio</label>
        <input type="text" name="municipio" value="<?php echo $alm->municipio; ?>" class="form-control" placeholder="Introduzca su Municipio " data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $alm->direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="telefono" value="<?php echo $alm->telefono; ?>" class="form-control" placeholder="Ingrese su  numero de telefono" data-validacion-tipo="requerido|email" />
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $alm->email; ?>" class="form-control" placeholder="Ingrese su correo electronico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Giro</label>
        <input type="text" name="giro" value="<?php echo $alm->giro; ?>" class="form-control" placeholder="Ingrese giro" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>DUI</label>
        <input type="text" name="dui" value="<?php echo $alm->DUI; ?>" class="form-control" placeholder="Ingrese su numero de dui" data-validacion-tipo="requerido|email" />
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
