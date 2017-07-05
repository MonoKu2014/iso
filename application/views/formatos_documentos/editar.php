<div class="container-fluid">

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Formato Documento
                <a href="<?= base_url(); ?>formatos_documentos" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>formatos_documentos/guardar_edicion" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="formato_documento_id" value="<?= $formato_documento->formato_documento_id; ?>">
                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Formato Documento (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="formato_documento" data-validate="string" class="form-control input-sm required" placeholder="Formato Documento" required value="<?= $formato_documento->formato_documento; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>formatos_documentos" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>