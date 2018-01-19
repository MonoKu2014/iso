<div class="container-fluid">

        <ol class="breadcrumb">
          <li><a href="<?= base_url();?>panel">Dashboard</a></li>
          <li>Estructura</li>
          <li><a href="<?= base_url();?>secciones_calidad">Riesgos y Oportunidades</a></li>
          <li class="active">Editar Riesgos y Oportunidades</li>
        </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Riesgos y Oportunidades
                <a href="<?= base_url(); ?>secciones_calidad" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>secciones_calidad/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="seccion_id" value="<?= $seccion->seccion_id; ?>">

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Sección (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="form-group">
                        <input type="text" class="form-control required" name="seccion" value="<?= $seccion->seccion; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="checkbox" value="1" name="sin_proceso" <?= is_checked($seccion->sin_proceso); ?> > Sin objetivo
                        <i class="fa fa-question-circle hastip pointer" title="Sí marca esta opción la sección que está a punto de crear no tendrá objetivo asociado"></i>
                    </div>
                </div>


               <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Contexto y Organización (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="area" required data-validate="number" id="area">
                            <option value="">Seleccione contexto...</option>
                        <?php foreach ($areas as $a): ?>
                            <option <?php if($a->area_id == $seccion->area_fk){ echo 'selected'; } ?> value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Responsable (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="responsable" required data-validate="number" id="responsable">
                            <option value="">Seleccione Responsable</option>
                        <?php foreach ($responsables as $r): ?>
                            <option <?php if($r->responsable_id == $seccion->responsable_fk){ echo 'selected'; } ?> value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
                        <?php endforeach ?>
                        </select>
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
                            <option <?php if($e->estado_id == $seccion->estado_fk){ echo 'selected'; } ?> value="<?= $e->estado_id; ?>"><?= $e->estado; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Frecuencia (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="frecuencia" required data-validate="number" id="frecuencia">
                            <option value="">Seleccione Frecuencia</option>
                        <?php foreach ($frecuencias as $f): ?>
                            <option <?php if($f->frecuencia_id == $seccion->frecuencia_fk){ echo 'selected'; } ?> value="<?= $f->frecuencia_id; ?>"><?= $f->frecuencia; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?= $seccion->seccion_nombre; ?>" data-validate="string" class="form-control required" placeholder="Nombre" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Objetivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" value="<?= $seccion->seccion_objetivo; ?>" name="objetivo" data-validate="string" class="form-control required" placeholder="Objetivo" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Genera Indicadores (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="indicadores" required data-validate="number" id="indicadores">
                            <option value="">Seleccione Indicadores</option>
                            <option <?php if($seccion->seccion_genera == 1){ echo 'selected'; } ?> value="1">Sí</option>
                            <option <?php if($seccion->seccion_genera == 0){ echo 'selected'; } ?> value="0">No</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>secciones_calidad" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>