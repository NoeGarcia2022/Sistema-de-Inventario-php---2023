<h1 class="page-header">
    <?php echo $alm->idcategoria != null ? $alm->nom_categoria : 'Nuevo Categoria'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Categoria">Categorias</a></li>
  <li class="active"><?php echo $alm->idcategoria != null ? $alm->nom_categoria : 'Nuevo Categoria'; ?></li>
</ol>

<form action="?c=Categoria&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idcategoria" value="<?php echo $alm->idcategoria; ?>" />
    
    <div class="form-group">
        <label>Nombre Categoria</label>
        <input type="text" name="nombre" value="<?php echo $alm->nom_categoria; ?>" class="form-control" placeholder="Ingrese el nombre de la categoria" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $alm->descripcion; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:7" />
    </div>
    

    <hr />
    <div class="text-right">
        <button class="btn btn-success" href="?c=Categoria&a=Crud">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
