<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Documentos
                <a href="<?= base_url(); ?>documentos" class="btn btn-default pull-right">
                    <i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>documentos/guardar_edicion" class="form" enctype="multipart/form-data">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <input type="hidden" name="documento_id" value="<?= $documento->documento_id; ?>">
                <input type="hidden" name="copia_actual" value="<?= $documento->copia; ?>">
                <p id="message"></p>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Documento (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="documento" value="<?= $documento->documento; ?>" data-validate="string" class="form-control required" placeholder="Nombre documento" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Claúsula (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="clausula" required data-validate="number" id="clausula">
                            <option value="">Seleccione claúsula...</option>
                        <?php foreach ($clausulas as $c): ?>
                            <option <?php if($documento->clausula_fk == $c->clausula_documento_id){ echo 'selected'; } ?> value="<?= $c->clausula_documento_id; ?>"><?= $c->clausula_documento_codigo.' - '.$c->clausula_documento; ?></option>
                        <?php endforeach ?>
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
                            <option <?php if($documento->area_fk == $a->area_id){ echo 'selected'; } ?> value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
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
                            <option value="<?= $documento->seccion_fk; ?>"><?= $documento->seccion; ?></option>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Tipo Documento (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="tipo_documento" required data-validate="number" id="tipo_documento">
                            <option value="">Seleccione tipo documento...</option>
                        <?php foreach ($tipos_documentos as $t): ?>
                            <option <?php if($documento->tipo_documento_fk == $t->tipo_documento_id){ echo 'selected'; } ?> value="<?= $t->tipo_documento_id; ?>"><?= $t->tipo_documento; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Responsable de preparar (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="responsable_preparar" required data-validate="number" id="responsable_preparar">
                            <option value="">Seleccione Responsable</option>
                        <?php foreach ($responsables as $r): ?>
                            <option <?php if($documento->responsable_preparar == $r->responsable_id){ echo 'selected'; } ?> value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Responsable de publicar (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="responsable_publicar" required data-validate="number" id="responsable_publicar">
                            <option value="">Seleccione Responsable</option>
                        <?php foreach ($responsables as $r): ?>
                            <option <?php if($documento->responsable_publicar == $r->responsable_id){ echo 'selected'; } ?> value="<?= $r->responsable_id; ?>"><?= $r->responsable; ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 alert alert-info" style="padding: 1px;width: 98%;">
                    <p><b>Copia actual:</b> <?= copia($documento->copia);?></p>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Copia no controlada (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="file" name="copia" data-validate="string" class="form-control required" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Versión
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="version" value="<?= $documento->version; ?>" data-validate="string" class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha de Vigencia (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="vigencia" value="<?= $documento->fecha_vigencia; ?>" data-validate="string" class="form-control required" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Fecha de Publicación (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="publicacion" value="<?= $documento->fecha_publicacion; ?>" data-validate="string" class="form-control required" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Palabras claves
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="claves" value="<?= $documento->palabras_claves; ?>" data-validate="string" class="form-control">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Observación
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="observacion" value="<?= $documento->observacion; ?>" data-validate="string" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>estados_incidencias" class="btn btn-default">Cancelar</a>
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

</script>