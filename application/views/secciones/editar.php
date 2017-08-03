<div class="container-fluid">

        <ol class="breadcrumb">
          <li><a href="<?= base_url();?>panel">Dashboard</a></li>
          <li>Procesos</li>
          <li><a href="<?= base_url();?>secciones">Secciones</a></li>
          <li class="active">Editar</li>
        </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Seccion
                <a href="<?= base_url(); ?>secciones" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>secciones/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="seccion_id" value="<?= $seccion->seccion_id; ?>">
                
                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Sección (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="seccion" required data-validate="number" id="seccion">
                            <option value="">Seleccione sección...</option>
                        </select>
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
                            <option value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
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
                        <?php foreach ($tipos_datos as $t): ?>
                            <option value="<?= $t->tipo_dato_id; ?>"><?= $t->tipo_dato; ?></option>
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
                        <?php foreach ($tipos_datos as $t): ?>
                            <option value="<?= $t->tipo_dato_id; ?>"><?= $t->tipo_dato; ?></option>
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
                        <?php foreach ($tipos_datos as $t): ?>
                            <option value="<?= $t->tipo_dato_id; ?>"><?= $t->tipo_dato; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>             


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" data-validate="string" class="form-control input-sm required" placeholder="Nombre de la sección" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Objetivo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="objetivo" data-validate="string" class="form-control input-sm required" placeholder="Objetivo de la sección" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Genera Indicadores (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="indicadores" required data-validate="number" id="indicadores">
                            <option value="">Seleccione Indicadores</option>
                        <?php foreach ($tipos_datos as $t): ?>
                            <option value="<?= $t->tipo_dato_id; ?>"><?= $t->tipo_dato; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>  


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>secciones" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>