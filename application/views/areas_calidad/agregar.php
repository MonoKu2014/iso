<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Estructura</li>
  <li><a href="<?= base_url();?>areas_calidad">Contexto y Organización</a></li>
  <li class="active">Agregar</li>
</ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Agregar Contexto y Organización
                <a href="<?= base_url(); ?>areas_calidad" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>areas_calidad/guardar" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Tipo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="radio" name="tipo" value="1" checked> Contexto<br>
                        <input type="radio" name="tipo" value="2"> Organización<br>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Contexto y Organización (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="area" data-validate="string" class="form-control required" placeholder="Área" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>areas_calidad" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>