<div class="container-fluid">

        <ol class="breadcrumb">
          <li><a href="<?= base_url();?>panel">Dashboard</a></li>
          <li>Estructura</li>
          <li><a href="<?= base_url();?>secciones_calidad">Riesgos y Oportunidades</a></li>
           <li><a href="<?= base_url();?>detalles_ejecucion/index/<?= $detalle_ejecucion->riesgo_oportunidad_fk; ?>">Listado Detalles Ejecución</a></li>
          <li class="active">Editar Detalle Ejecución</li>
        </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Detalle Ejecución
                <a href="<?= base_url(); ?>detalles_ejecucion/index/<?= $detalle_ejecucion->riesgo_oportunidad_fk; ?>" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>detalles_ejecucion/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="detalle_ejecucion_id" value="<?= $detalle_ejecucion->detalle_ejecucion_id; ?>">
                <input type="hidden" name="id_riesgo" value="<?= $detalle_ejecucion->riesgo_oportunidad_fk; ?>">


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha Ejecución (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="fecha_ejecucion" id="fecha_ejecucion" data-validate="string" class="form-control date" placeholder="Fecha Ejecución" required value="<?= $detalle_ejecucion->detalle_fecha_ejecucion;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Descripción (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="descripcion" data-validate="string" class="form-control required" placeholder="Descripción" required value="<?=$detalle_ejecucion->detalle_descripcion;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Estado (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="estado" required data-validate="number" id="estado">
                            <option value="">Seleccione Estado</option>
                        <?php foreach ($estados as $e): ?>
                            <option <?php if($e->estado_ejecucion_id == $detalle_ejecucion->detalle_estado_fk){ echo 'selected'; } ?> value="<?= $e->estado_ejecucion_id; ?>"><?= $e->estado_ejecucion; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Observación (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="observacion" data-validate="string" class="form-control required" placeholder="Observación" required value="<?=$detalle_ejecucion->detalle_observacion;?>">
                    </div>
                </div>            


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>detalles_ejecucion/index/<?= $detalle_ejecucion->riesgo_oportunidad_fk; ?>" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>