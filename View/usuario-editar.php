<h1 class="page-header">
    <?php echo $alm->idusuario!= null ? $alm->nombres : 'Nuevo Usuario'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Usuario">Usuarios</a></li>
  <li class="active"><?php echo $alm->idusuario != null ? $alm->nombres : 'Nuevo Usuario'; ?></li>
</ol>

<form action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idusuario" value="<?php echo $alm->idusuario; ?>" />
    
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="<?php echo $alm->nombres; ?>" class="form-control" placeholder="Ingrese el nombre de la categoria" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="" name="correo" value="<?php echo $alm->correo; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="user1" value="<?php echo $alm->user; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Clave</label>
        <input type="password" name="clave" value="<?php echo $alm->clave; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>

    <hr />
    <div class="text-right">
        <button class="btn btn-success" >Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
