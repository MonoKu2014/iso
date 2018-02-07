<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Estructura</li>
  <li><a href="<?= base_url();?>objetivos">Indicadores</a></li>
  <li class="active">Editar Indicador</li>
</ol>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Indicador
                <a href="<?= base_url(); ?>objetivos" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>objetivos/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="objetivo_id" value="<?= $objetivo->objetivo_id; ?>">

               <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Contexto y Organización (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="area" required data-validate="number" id="area">
                            <option value="">Seleccione contexto...</option>
                        <?php foreach ($areas as $a): ?>
                            <option <?php if($a->area_id == $objetivo->area_fk){ echo 'selected'; } ?> value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Riesgo y Oportunidad (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="seccion" required data-validate="number" id="seccion">
                            <option value="<?= $objetivo->seccion_fk; ?>"><?= $objetivo->seccion; ?></option>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Código del Indicador (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="codigo" value="<?= $objetivo->objetivo_codigo;?>" data-validate="string" class="form-control required" placeholder="Código del objetivo" required>
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
                            <option <?php if($r->responsable_id == $objetivo->responsable_fk){ echo 'selected'; } ?> value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
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
                            <option <?php if($e->estado_id == $objetivo->estado_fk){ echo 'selected'; } ?> value="<?= $e->estado_id; ?>"><?= $e->estado; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?= $objetivo->objetivo_nombre;?>" data-validate="string" class="form-control required" placeholder="Nombre del objetivo" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Objetivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="objetivo" value="<?= $objetivo->objetivo_objetivo;?>" data-validate="string" class="form-control required" placeholder="Objetivo del indicador" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Tipo de Indicador (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select name="tipo" class="form-control required" id="tipo_indicador">
                            <option value="">Seleccione</option>
                            <option value="1" <?php if($objetivo->objetivo_tipo == 1){ echo 'selected'; } ?>>Tipo A</option>
                            <option value="2" <?php if($objetivo->objetivo_tipo == 2){ echo 'selected'; } ?>>Tipo B</option>
                            <option value="3" <?php if($objetivo->objetivo_tipo == 3){ echo 'selected'; } ?>>Tipo C</option>
                        </select>
                    </div>
                </div>


                <!--  LOS SIGUIENTES DIVS SE CARGAN DE ACUERDO A LA SELECCIÓN DEL SELECTOR DE ARRIBA -->
                <div class="divTipo" style="display: none;" id="tipoA">
                    <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                        Valor del Indicador (*)
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <select name="tipo_a" class="form-control" id="tipo_indicador_a">
                                <option value="">Seleccione</option>
                                <option value="1" <?php if($objetivo->valor_A == 1){ echo 'selected'; } ?>>Bajo</option>
                                <option value="2" <?php if($objetivo->valor_A == 2){ echo 'selected'; } ?>>Medio</option>
                                <option value="3" <?php if($objetivo->valor_A == 3){ echo 'selected'; } ?>>Alto</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="divTipo" style="display: none;" id="tipoB">
                    <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                        Valor del Indicador (*)
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <select name="tipo_b" class="form-control" id="tipo_indicador_b">
                                <option value="">Seleccione</option>
                                <option value="1" <?php if($objetivo->valor_B == 1){ echo 'selected'; } ?>>Malo</option>
                                <option value="2" <?php if($objetivo->valor_B == 2){ echo 'selected'; } ?>>Mediano</option>
                                <option value="3" <?php if($objetivo->valor_B == 3){ echo 'selected'; } ?>>Bueno</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="divTipo" style="display: none;" id="tipoC">

                    <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                        Dato Superior (*)
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <select class="form-control" name="superior" data-validate="number" id="superior">
                                <option value="<?= $objetivo->dato_superior_fk; ?>"><?= $objetivo->dato_nombre; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                        Dato Inferior (*)
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <select class="form-control" name="inferior" data-validate="number" id="inferior">
                                <option value="<?= $objetivo->dato_inferior_fk; ?>"><?= $objetivo->dato_nombre; ?></option>
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
                                    <input type="radio" name="evaluacion_positiva" id="menor_minimo" value="1" <?php if($objetivo->evaluacion_positiva_minima == 1){ echo 'checked'; } ?>>
                                Menor a mínimo ideal
                              </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="evaluacion_positiva" id="mayor_maximo" value="2" <?php if($objetivo->evaluacion_positiva_maxima == 1){ echo 'checked'; } ?>>
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
                            <input type="text" name="real" id="real" data-validate="number" class="form-control" placeholder="Indicador real" value="<?= $objetivo->indicador_real;?>">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                        Indicador Mínimo Ideal (*)
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <input type="text" name="minimo" id="minimo" data-validate="number" class="form-control" placeholder="Indicador mínimo ideal" onkeyup="sumar();" value="<?= $objetivo->indicador_minimo;?>">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                        Indicador Máximo Ideal (*)
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <input type="text" name="maximo" id="maximo" data-validate="number" class="form-control" placeholder="Indicador máximo ideal" onkeyup="sumar();" value="<?= $objetivo->indicador_maximo;?>">
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>objetivos" class="btn btn-default">Cancelar</a>
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
        url: _URL + 'ajax/riesgo_por_contexto/' + $(this).val(),
        success: function(response){
            $('#seccion').html(response);
        }
    });
});

$('#tipo_indicador').on('change', function(){
    var valor = $(this).val();
    mostrarDivs(valor);
});

function sumar(){
    var valor_minimo = $('#minimo').val();
    var valor_maximo = $('#maximo').val();
    var resultado = parseFloat(valor_minimo) + parseFloat(valor_maximo);
    var resultado2 = resultado / 2;
    $('#real').val(resultado2);
}


function mostrarDivs(valor)
{
    $('.divTipo').hide('fast');

    if(valor == 1){
        $('#tipoA').show('fast');
    } else if(valor == 2){
        $('#tipoB').show('fast');
    } else {
        $('#tipoC').show('fast');
    }
}


$(document).ready(function(){
    var valor = $('#tipo_indicador').val();
    mostrarDivs(valor);
});

</script>