<div class="container-fluid">

        <ol class="breadcrumb">
          <li><a href="<?= base_url();?>panel">Dashboard</a></li>
          <li>Estructura</li>
          <li><a href="<?= base_url();?>indicadores_procesos">Indicadores-Procesos</a></li>
          <li class="active">Editar</li>
        </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Indicador-Proceso
                <a href="<?= base_url(); ?>indicadores_procesos" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>indicadores_procesos/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="indicador_proceso_id" value="<?= $indicador_proceso->indicador_proceso_id; ?>">

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Área (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="area" required data-validate="number" id="area">
                            <option value="">Seleccione área...</option>
                        <?php foreach ($areas as $a): ?>
                            <option <?php if($a->area_id == $indicador_proceso->area_fk){ echo 'selected'; } ?> value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
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
                            <option value="<?= $indicador_proceso->seccion_fk; ?>"><?= $indicador_proceso->seccion; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Proceso (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="proceso" required data-validate="number" id="proceso">
                            <option value="<?= $indicador_proceso->proceso_fk; ?>"><?= $indicador_proceso->proceso_nombre; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador(*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="indicador" required data-validate="number" id="indicador">
                             <option value="<?= $indicador_proceso->indicador_fk; ?>"><?= $indicador_proceso->indicador_codigo; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Valor Dato Superior (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="dato_superior" id="dato_superior" data-validate="number" class="form-control required" placeholder="Valor dato superior" required onkeyup="sumar();" value="<?= $indicador_proceso->valor_dato_superior;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Valor Dato Inferior (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="dato_inferior" id="dato_inferior" data-validate="number" class="form-control required" placeholder="Valor dato inferior" required onkeyup="sumar();" value="<?= $indicador_proceso->valor_dato_inferior;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador % (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="total_indidicador" id="total_indidicador" data-validate="number" class="form-control" placeholder="Indicador %" value="<?= $indicador_proceso->indicador_proceso_indicador;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="fecha" data-validate="string" class="form-control" placeholder="Fecha" value="<?= $indicador_proceso->indicador_proceso_fecha;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Observaciones (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                    <input name="observaciones" data-validate="string" class="form-control required" placeholder="Observaciones" required value="<?= $indicador_proceso->indicador_proceso_observacion;?>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>indicadores_procesos" class="btn btn-default">Cancelar</a>
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
                $('#indicador').html(response);
            }
        });
    });


    function sumar(){

        var valor_minimo = $('#dato_superior').val();
        var valor_maximo = $('#dato_inferior').val();
        var resultado = parseFloat(valor_minimo) + parseFloat(valor_maximo);
        var resultado2 = resultado / 2;
        $('#total_indidicador').val(resultado2);
    }   



</script>