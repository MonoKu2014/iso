<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Registros</li>
        <li>Orientado a Procesos</li>
        <li><a href="<?= base_url();?>registros_indicadores">Registro de Indicadores</a></li>
        <li class="active">Editar</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Registro de Indicador
                <a href="<?= base_url(); ?>registros_indicadores" class="btn btn-default pull-right">
                    <i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>registros_indicadores/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <?= $this->session->flashdata('message');?>
                <input type="hidden" name="indicador_id" value="<?= $indicador->indicador_id; ?>">

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Área (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="area" required data-validate="number" id="area">
                            <option value="">Seleccione área...</option>
                        <?php foreach ($areas as $a): ?>
                            <option <?php if($a->area_id == $indicador->area_fk){ echo 'selected'; } ?> value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
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
                            <option value="<?= $indicador->seccion_fk; ?>"><?= $indicador->seccion; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Proceso (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="proceso" required data-validate="number" id="proceso">
                            <option value="<?= $indicador->proceso_fk; ?>"><?= $indicador->proceso_nombre; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Código Indicador (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="codigo" required data-validate="number" id="codigo">
                            <option value="<?= $indicador->indicador_codigo; ?>"><?= $indicador->indicador_id; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Valor Dato Superior (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="number" name="valor_dato_superior" id="valor_dato_superior" data-validate="number" min="0" class="form-control" placeholder="Valor dato superior" onblur="sumar();" value="<?= $indicador->valor_dato_superior;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Dato Inferior (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="number" name="valor_dato_inferior" id="valor_dato_inferior" data-validate="number" min="0" class="form-control" placeholder="Valor dato inferior" onblur="sumar();" value="<?= $indicador->valor_dato_inferior;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador (*) %
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="number" readonly name="indicador_final" id="indicador_final" data-validate="number" class="form-control" value="<?= $indicador->valor_indicador;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="ntext" readonly name="fecha" id="fecha" data-validate="number" class="form-control" value="<?= $indicador->fecha_indicador; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Observaciones (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <textarea name="observaciones" data-validate="string" class="form-control required" placeholder="Observaciones" required><?= $indicador->indicador_observaciones; ?></textarea>
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