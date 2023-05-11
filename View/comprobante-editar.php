<h1 class="page-header">
    <?php echo $alm->idcomprobante != null ? $alm->giro : 'Comprobante Credito Fiscal'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Comprobante">Comprobante Credito Fiscal</a></li>
  <li class="active"><?php echo $alm->idcomprobante!= null ? $alm->giro: 'Comprobante Credito Fiscal'; ?></li>
</ol>


<form action="?c=Comprobante&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idcomprobante" value="<?php echo $alm->idcomprobante; ?>" />
    
    <div class="form-group">
        <label>Giro</label>
        <input type="text" name="giro" value="<?php echo $alm->giro; ?>" class="form-control" placeholder="Ingrese el numero de factura" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Condiciones de Operaciones</label>
        <input type="text" name="condiciones_operacion" value="<?php echo $alm->condiciones_operacion; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Venta a Cuenta</label>
        <input type="text" name="venta_a_cuenta" value="<?php echo $alm->venta_a_cuenta; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Numero de Remision</label>
        <input type="text" name="numero_remision" value="<?php echo $alm->numero_remision; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Fecha Remision</label>
        <input type="date" name="fecha_remision" value="<?php echo $alm->fecha_remision; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Suma</label>
        <input type="text" name="sumas" value="<?php echo $alm->sumas; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Iva</label>
        <input type="text" name="iva" value="<?php echo $alm->iva; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>SubTotal</label>
        <input type="text" name="subtotal" value="<?php echo $alm->subtotal; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Venta Exenta</label>
        <input type="text" name="ventas_exenta" value="<?php echo $alm->ventas_exenta; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Venta no Sujeta</label>
        <input type="text" name="venta_no_sujetas" value="<?php echo $alm->venta_no_sujetas; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label>Iva Retenido</label>
        <input type="text" name="iva_retenido" value="<?php echo $alm->iva_retenido; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
    </div>

    <div class="form-group">
        <label> Venta Total</label>
        <input type="text" name="venta_total" value="<?php echo $alm->venta_total; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:7" />
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