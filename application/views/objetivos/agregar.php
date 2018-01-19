<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Estructura</li>
  <li><a href="<?= base_url();?>objetivos">Objetivos</a></li>
  <li class="active">Agregar Objetivo</li>
</ol>



    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Agregar Objetivo
                <a href="<?= base_url(); ?>objetivos" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>objetivos/guardar" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Contexto y Organización (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="area" required data-validate="number" id="area">
                            <option value="">Seleccione contexto...</option>
                        <?php foreach ($areas as $a): ?>
                            <option value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
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
                            <option value="">Seleccione riesgo...</option>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Código del Objetivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="codigo" data-validate="string" class="form-control required" placeholder="Código del objetivo" required>
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
                            <option value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
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
                            <option value="<?= $e->estado_id; ?>"><?= $e->estado; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" data-validate="string" class="form-control required" placeholder="Nombre del objetivo" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Objetivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="objetivo" data-validate="string" class="form-control required" placeholder="Objetivo" required>
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

</script>