<div class="container-fluid">

        <ol class="breadcrumb">
          <li><a href="<?= base_url();?>panel">Dashboard</a></li>
          <li>Registros</li>
          <li>Orientado a Procesos</li>
          <li><a href="<?= base_url();?>accion_mejoras">Acción de Mejora</a></li>
          <li class="active">Editar</li>
        </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Acción de Mejora
                <a href="<?= base_url(); ?>accion_mejoras" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>accion_mejoras/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="accion_id" value="<?= $mejora->accion_id; ?>">

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Asunto (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="asunto" id="asunto" class="form-control required" placeholder="Asunto" required value="<?= $mejora->acc_asunto;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Incidencia (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="incidencia" required data-validate="number" id="incidencia">
                            <option value="">Seleccione Incidencia...</option>
                            <?php foreach ($incidencias as $i): ?>
                                <option <?php
                                        if($mejora->acc_incidencia_fk == $i->incidencia_id){
                                            echo 'selected';
                                        } ?>
                                        value="<?= $i->incidencia_id; ?>"><?= $i->asunto_incidencia; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Sección (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="seccion" required data-validate="number" id="seccion">
                            <option value="<?= $mejora->acc_seccion_fk; ?>"><?= $mejora->seccion; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Proceso (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="proceso" required data-validate="number" id="proceso">
                            <option value="<?= $mejora->acc_proceso_fk; ?>"><?= $mejora->proceso_nombre; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha Creación (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="fecha_creacion" id="fecha_creacion" data-validate="string" class="form-control date" placeholder="Fecha Creación" value="<?= $mejora->acc_fecha_creacion;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Acción (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="accion" required data-validate="number" id="accion">
                            <option value="">Seleccione Acción</option>
                            <?php foreach ($tipo_accion as $a): ?>
                                <option <?php if($a->accion_id == $mejora->acc_accion_fk){ echo 'selected'; } ?> value="<?= $a->accion_id; ?>"><?= $a->accion; ?></option>
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
                            <option value="">Seleccione Responsable...</option>
                            <?php foreach ($responsables as $r): ?>
                                <option <?php if($r->responsable_id == $mejora->acc_responsable_fk){ echo 'selected'; } ?> value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Resultado (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="resultado" id="resultado" class="form-control required" placeholder="Resultado" required value="<?= $mejora->acc_resultado;?>">
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
                            <option <?php if($e->estado_id == $mejora->acc_estado_fk){ echo 'selected'; } ?> value="<?= $e->estado_id; ?>"><?= $e->estado; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha Inicio (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="fecha_inicio" id="fecha_inicio" data-validate="string" class="form-control date" placeholder="Fecha" value="<?= $mejora->acc_fecha_inicio;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha Término (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="fecha_termino" id="fecha_termino" data-validate="string" class="form-control date" placeholder="Fecha" value="<?= $mejora->acc_fecha_termino;?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>accion_mejoras" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>


<script>

    $('#incidencia').on('change', function(){
        $.ajax({
            type: 'post',
            url: _URL + 'ajax/seccion_por_incidencia/' + $(this).val(),
            success: function(response){
                $('#seccion').html(response);
            }
        });
    });


    $('#incidencia').on('change', function(){
        $.ajax({
            type: 'post',
            url: _URL + 'ajax/proceso_por_incidencia/' + $(this).val(),
            success: function(response){
                $('#proceso').html(response);
            }
        });
    });


</script>