<div class="container-fluid">

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Agregar Responsable
                <a href="<?= base_url(); ?>responsables" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12">
        <form method="post" action="<?= base_url(); ?>responsables/guardar" class="form">

        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <p><em>Todos los campos marcados con (*) son de caracter obligatorio</em></p>
                <p id="message"></p>
                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Funcionario (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="funcionario" data-validate="string" class="form-control input-sm required" placeholder="Funcionario" required>
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
                                <option value="<?= $d->departamento_id; ?>"><?= $d->departamento; ?></option>
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
                                <option value="<?= $c->cargo_id; ?>"><?= $c->cargo; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
               

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Nombre (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="nombre" data-validate="string" class="form-control input-sm required" placeholder="Nombre" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Título (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="titulo" data-validate="string" class="form-control input-sm required" placeholder="Título" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Curriculum
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="curriculum" data-validate="string" class="form-control input-sm" placeholder="Curriculum">
                    </div>
                </div>
                

                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Teléfono Comercial (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="telefono_comercial" data-validate="number" class="form-control input-sm required" placeholder="Teléfono Comercial" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Teléfono Particular (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="telefono_particular" data-validate="number" class="form-control input-sm required" placeholder="Teléfono Particular" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Teléfono Celular (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="telefono_celular" data-validate="number" class="form-control input-sm required" placeholder="Teléfono Celular" required>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    E-mail (*)
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="email" data-validate="string" class="form-control input-sm required" placeholder="E-mail" required>
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
                                <option value="<?= $e->estado_id; ?>"><?= $e->estado; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3 bg-info information">
                    Foto
                </div>
                <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="foto" data-validate="string" class="form-control input-sm" placeholder="Foto">
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