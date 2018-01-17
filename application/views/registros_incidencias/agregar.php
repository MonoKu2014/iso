<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Registros</li>
        <li><a href="<?= base_url();?>registros_incidencias">Registros de Incidencias</a></li>
        <li class="active">Agregar</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Agregar Registro de Incidencia
                <a href="<?= base_url(); ?>registros_incidencias" class="btn btn-default pull-right">
                    <i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
            <?= $this->session->flashdata('message');?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>registros_incidencias/guardar" class="form" enctype="multipart/form-data">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Secciones (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="seccion" required data-validate="number" id="seccion">
                            <option value="">Seleccione sección...</option>
                        <?php foreach ($secciones as $s): ?>
                            <option value="<?= $s->seccion_id; ?>"><?= $s->seccion; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Proceso (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="proceso" required data-validate="number" id="proceso">
                            <option value="">Seleccione proceso...</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Origen Incidencia (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="origen" required data-validate="number" id="origen">
                            <option value="">Seleccione origen...</option>
                        <?php foreach ($origenes as $o): ?>
                            <option value="<?= $o->origen_incidencia_id; ?>"><?= $o->origen_incidencia; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Tipo de Incidencia (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="tipo" required data-validate="number" id="tipo">
                            <option value="">Seleccione tipo...</option>
                        <?php foreach ($tipos as $t): ?>
                            <option value="<?= $t->tipo_incidencia_id; ?>"><?= $t->tipo_incidencia; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha de Creación (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="fecha" data-validate="string" class="form-control required date">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Responsable de la detección (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="deteccion" required data-validate="number" id="deteccion">
                            <option value="">Seleccione responsable...</option>
                        <?php foreach ($responsables as $r): ?>
                            <option value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Asunto (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <textarea name="asunto" data-validate="string" class="form-control required" placeholder="Asunto" required></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Descripción (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <textarea name="descripcion" data-validate="string" class="form-control required" placeholder="Descripción" required></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Causa (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="causa" required data-validate="number" id="causa">
                            <option value="">Seleccione causa...</option>
                        <?php foreach ($causas as $c): ?>
                            <option value="<?= $c->causa_incidencia_id; ?>"><?= $c->causa_incidencia; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Responsable de la solución (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="solucion" required data-validate="number" id="solucion">
                            <option value="">Seleccione responsable...</option>
                        <?php foreach ($responsables as $r): ?>
                            <option value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Solución (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <textarea name="solucion_texto" data-validate="string" class="form-control required" placeholder="Solución" required></textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Estado (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="radio" name="estado" value="1" checked> Iniciada
                        <input type="radio" name="estado" value="2" disabled> Suspendida
                        <input type="radio" name="estado" value="3" disabled> Finalizada
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha de Inicio (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="inicio" data-validate="string" class="form-control required date">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha de Término (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="termino" data-validate="string" class="form-control required date">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Archivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="file" name="archivo" data-validate="string" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>indicadores" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
        </div>
    </div>

</div>

<script>

    $('#area').on('change', function(){
        $.ajax({
            type: 'post',
            url: _URL + 'ajax/secciones_por_area/' + $(this).val(),
            success: function(response){
                $('#seccion').html(response);
            }
        });
    });


    $('#seccion').on('change', function(){
        $.ajax({
            type: 'post',
            url: _URL + 'ajax/procesos_por_seccion/' + $(this).val(),
            success: function(response){
                $('#proceso').html(response);
            }
        });
    });


    $('#proceso').on('change', function(){
        $.ajax({
            type: 'post',
            url: _URL + 'ajax/indicadores_por_procesos/' + $(this).val(),
            success: function(response){
                $('#codigo').html(response);
            }
        });
    });


    function sumar(){
        var inferior = $('#valor_dato_inferior').val();
        var superior = $('#valor_dato_superior').val();
        if(inferior != '' || superior != ''){
            var resultado2 = (parseInt(superior) * 100) / parseInt(inferior);
            $('#indicador_final').val(resultado2);
        }
    }


</script>