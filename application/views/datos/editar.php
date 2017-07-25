<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Parámetros</li>
  <li><a href="<?= base_url();?>datos">Datos Indicadores</a></li>
  <li class="active">Editar</li>
</ol>



    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Dato
                <a href="<?= base_url(); ?>datos" class="btn btn-default pull-right">
                    <i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>datos/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="dato_id" value="<?= $dato->dato_id; ?>">
                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Código (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="codigo" data-validate="string" class="form-control input-sm required" placeholder="Código" required value="<?= $dato->dato_codigo; ?>">
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
                            <option <?php if($dato->area_fk == $a->area_id){ echo 'selected'; } ?> value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
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
                            <option value="<?= $dato->seccion_fk; ?>"><?= $dato->seccion; ?></option>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Proceso (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="proceso" required data-validate="number" id="proceso">
                            <option value="<?= $dato->proceso_fk; ?>"><?= $dato->proceso_nombre; ?></option>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre del dato (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" data-validate="string" class="form-control input-sm required" placeholder="Nombre del dato" required value="<?= $dato->dato_nombre; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Tipo de dato (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="tipo" required data-validate="number" id="tipo">
                            <option value="">Seleccione tipo de dato...</option>
                        <?php foreach ($tipos_datos as $t): ?>
                            <option <?php if($dato->tipo_dato_fk == $t->tipo_dato_id){ echo 'selected'; } ?> value="<?= $t->tipo_dato_id; ?>"><?= $t->tipo_dato; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>datos" class="btn btn-default">Cancelar</a>
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

    var area = $(this).val();
    $('#proceso').empty().html('<option value="">Seleccione proceso...</option>');
    $.get(_URL + 'ajax/secciones_por_area/' + area, function(data){
      $('#seccion').html(data);
    });

});


$('#seccion').on('change', function(){

    var seccion = $(this).val();

    $.get(_URL + 'ajax/procesos_por_seccion/' + seccion, function(data){
      $('#proceso').html(data);
    });

});

</script>