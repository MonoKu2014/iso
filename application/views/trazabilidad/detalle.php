<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Consultas</li>
  <li><a href="<?= base_url();?>trazabilidad">Registro de trazabilidad de operaciones por usuario</a></li>
  <li class="active">Detalle trazabilidad</li>
</ol>



    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Detalle trazabilidad
                <a href="<?= base_url(); ?>trazabilidad" class="btn btn-default pull-right">
                    <i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">


        <div class="row">
            <div class="col-xs-12 col-lg-12">

                <div style="border: 1px solid #eee;padding: 20px 5px;">
                    <div class="col-lg-12">
                        <h4>Detalle general de trazabilidad</h4>
                    </div>
                    <div class="col-lg-2">ID traza</div><div class="col-lg-10"><?= $traza->traza_id;?></div>
                    <div class="col-lg-2">Fecha</div><div class="col-lg-10"><?= $traza->traza_fecha;?></div>
                    <div class="col-lg-2">Hora</div><div class="col-lg-10"><?= $traza->traza_hora;?></div>
                    <div class="col-lg-2">Tabla</div><div class="col-lg-10"><?= $traza->traza_tabla;?></div>
                    <div class="col-lg-2">Transacción</div><div class="col-lg-10"><?= $traza->traza_detalle;?></div>
                    <div class="col-lg-2">Detalle</div><div class="col-lg-10"><?= $traza->traza_texto;?></div>

                    <?php if ($traza->traza_id_edita): ?>
                        <?php $traza_detalle = obtener_traza_edicion($traza->traza_id);?>

                        <div class="col-lg-12">
                            <br><br>
                            <h4>Detalle de los campos editados</h4>
                            <br>
                        </div>
                        <div class="col-lg-2"><b>Valores anteriores:</b></div>
                        <div class="col-lg-10"><?= $traza_detalle->valor_anterior;?></div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-2"><b>Valores actuales:</b></div>
                        <div class="col-lg-10"><?= $traza_detalle->valor_actual;?></div>

                    <?php endif ?>


                    <?php if ($traza->traza_id_eliminado): ?>
                        <div class="col-lg-2">Registro Eliminado con ID</div>
                        <div class="col-lg-10"><?= $traza->traza_id_eliminado;?></div>
                    <?php endif ?>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>



        </div>
    </div>

</div>