<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar Responsable
                <a href="<?= base_url(); ?>responsables" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>responsables/guardar_edicion" class="form" enctype="multipart/form-data">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <input type="hidden" name="responsable_id" value="<?= $responsable->responsable_id; ?>">
                <input type="hidden" name="cv_actual" value="<?= $responsable->responsable_curriculum; ?>">
                <input type="hidden" name="foto_actual" value="<?= $responsable->responsable_foto; ?>">

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Funcionario (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="funcionario" class="form-control required" placeholder="Funcionario" required value="<?= $responsable->responsable_funcionario; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Departamento (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="departamento" required data-validate="number">
                            <option value="">Selecccione Departamento</option>
                            <?php foreach ($departamentos as $d): ?>
                                <option <?php if($responsable->departamento_fk == $d->departamento_id){ echo 'selected'; } ?> value="<?= $d->departamento_id; ?>"><?= $d->departamento; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Cargo (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="cargo" required data-validate="number">
                            <option value="">Selecccione Cargo</option>
                            <?php foreach ($cargos as $c): ?>
                                <option <?php if($responsable->cargo_fk == $c->cargo_id){ echo 'selected'; } ?> value="<?= $c->cargo_id; ?>"><?= $c->cargo; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control required" placeholder="Nombre" required value="<?= $responsable->responsable; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Título (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control required" placeholder="Título" required value="<?= $responsable->responsable_titulo; ?>">
                    </div>
                </div>


                <div class="col-xs-12 alert alert-info" style="padding: 1px;width: 98%;">
                    <p><b>Currículum actual:</b> <?= cv($responsable->responsable_curriculum);?></p>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Curriculum
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="file" name="curriculum" class="form-control" placeholder="Curriculum" value="<?= $responsable->responsable_curriculum; ?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Teléfono Comercial (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="telefono_comercial" data-validate="number" class="form-control required" placeholder="Teléfono Comercial" required value="<?= $responsable->responsable_fono_comercial; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Teléfono Particular (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="telefono_particular" data-validate="number" class="form-control required" placeholder="Teléfono Particular" required value="<?= $responsable->responsable_fono_particular; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Teléfono Celular (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="telefono_celular" data-validate="number" class="form-control required" placeholder="Teléfono Celular" required value="<?= $responsable->responsable_fono_celular; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    E-mail (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control required" placeholder="E-mail" required value="<?= $responsable->responsable_email; ?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Estado (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <select class="form-control required" name="estado" required data-validate="number">
                            <option value="">Selecccione Estado</option>
                            <?php foreach ($estados as $e): ?>
                                <option <?php if($responsable->estado_fk == $e->estado_id){ echo 'selected'; } ?> value="<?= $e->estado_id; ?>"><?= $e->estado; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 alert alert-info" style="padding: 1px;width: 98%;">
                    <p><b>Foto actual:</b> <?= foto($responsable->responsable_foto);?></p>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Foto
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="file" name="foto" class="form-control" placeholder="Foto" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <button type="submit" class="btn btn-success save">Guardar</button>
                        <a href="<?= base_url(); ?>responsables" class="btn btn-default">Cancelar</a>
                    </div>
                </div>


            </div>
        </div>


        </form>
    	</div>
    </div>

</div>