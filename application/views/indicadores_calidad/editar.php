<div class="container-fluid">

        <ol class="breadcrumb">
          <li><a href="<?= base_url();?>panel">Dashboard</a></li>
          <li>Estructura</li>
          <li><a href="<?= base_url();?>indicadores">Indicadores</a></li>
          <li class="active">Editar</li>
        </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Indicador
                <a href="<?= base_url(); ?>indicadores" class="btn btn-default pull-right">
                    <i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>indicadores/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="indicador_id" value="<?= $indicador->indicador_id; ?>">

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="indicador" data-validate="string" class="form-control required" placeholder="indicador" required value="<?= $indicador->indicador_codigo;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" data-validate="string" class="form-control required" placeholder="Nombre del indicador" required value="<?= $indicador->indicador_nombre;?>">
                    </div>
                </div>

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
                    Objetivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                    <input name="objetivo" data-validate="string" class="form-control required" placeholder="Objetivo del indicador" required value="<?= $indicador->indicador_objetivo;?>"></input>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Dato Superior (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="superior" required data-validate="number" id="superior">
                            <option value="<?= $indicador->dato_superior_fk; ?>"><?= $indicador->dato_nombre; ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Dato Inferior (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="inferior" required data-validate="number" id="inferior">
                            <option value="<?= $indicador->dato_inferior_fk; ?>"><?= $indicador->dato_nombre; ?></option>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Evaluación Positiva (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="evaluacion_positiva" id="menor_minimo" value="1" checked>
                            Menor a mínimo ideal
                          </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="evaluacion_positiva" id="mayor_maximo" value="2">
                            Mayor a máximo ideal
                          </label>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador Real (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="real" id="real" data-validate="number" class="form-control" placeholder="Indicador real" value="<?= $indicador->indicador_real;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador Mínimo Ideal (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="minimo" id="minimo" data-validate="number" class="form-control required" placeholder="Indicador mínimo ideal" required onkeyup="sumar();" value="<?= $indicador->indicador_minimo;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Indicador Máximo Ideal (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="maximo" id="maximo" data-validate="number" class="form-control required" placeholder="Indicador máximo ideal" required onkeyup="sumar();" value="<?= $indicador->indicador_maximo;?>">
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
            url: _URL + 'ajax/datos_por_procesos/' + $(this).val(),
            success: function(response){
                $('#superior').html(response);
            }
        });
    });


    $('#proceso').on('change', function(){
        $.ajax({
            type: 'post',
            url: _URL + 'ajax/datos_por_procesos/' + $(this).val(),
            success: function(response){
                $('#inferior').html(response);
            }
        });
    });


    function sumar(){

        var valor_minimo = $('#minimo').val();
        var valor_maximo = $('#maximo').val();
        var resultado = parseFloat(valor_minimo) + parseFloat(valor_maximo);
        var resultado2 = resultado / 2;
        $('#real').val(resultado2);
<<<<<<< Updated upstream
    }
=======
    }
>>>>>>> Stashed changes



</script>