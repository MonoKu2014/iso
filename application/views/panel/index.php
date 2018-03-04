<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Bienvenido Sr: <small style="color: #fff;"><?= $this->session->nombre; ?></small>
                <small class="pull-right" style="color: #fff;font-size: 13px;">
                    Hoy es <?= strftime("%A %d de %B del %Y"); ?>
                </small>
            </h1>
        </div>
    </div>
    <!-- /.row -->



    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message');?>
            <h2>
                DashBoard ISO Quality
            </h2>
        </div>
    </div>


    <div class="row">

    <br>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= cantidad_documentos();?></div>
                            <div>Modificaciones <br>de Documentos</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url();?>modificacion_documentos">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= cantidad_usuarios();?></div>
                            <div>Usuarios <br>registrados</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url();?>usuarios">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= cantidad_mejoras();?></div>
                            <div>Acciones <br>de Mejora</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url();?>accion_mejoras">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


       <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= cantidad_incidencias();?></div>
                            <div>Registros <br>de Incidencias</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url();?>registros_incidencias">
                    <div class="panel-footer">
                        <span class="pull-left">Ver detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    </div>


</div>