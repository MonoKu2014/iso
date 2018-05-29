<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Consultas</li>
  <li class="active">Mapa de Procesos</li>
</ol>



    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Mapa de Procesos
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">


        <div class="row">
            <div class="col-xs-12 col-lg-12">


                <?php foreach ($areas as $area): ?>

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#area_<?= $area->area_id;?>">Área: <?= $area->area;?></a>
                            </h4>
                        </div>
                        <div id="area_<?= $area->area_id;?>" class="panel-collapse collapse">
                            <div class="panel-body">


                            <?php if(obtener_secciones_por_area($area->area_id) !== null): ?>

                            <?php foreach (obtener_secciones_por_area($area->area_id) as $seccion): ?>

                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#seccion_<?= $seccion->seccion_id;?>">
                                                    Sección: <?= $seccion->seccion_nombre;?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="seccion_<?= $seccion->seccion_id;?>" class="panel-collapse collapse">
                                            <div class="panel-body">

                                            <?php if(obtener_procesos_por_seccion($seccion->seccion_id) !== null): ?>

                                            <?php foreach (obtener_procesos_por_seccion($seccion->seccion_id) as $proceso): ?>

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#proceso_<?= $proceso->proceso_id;?>">
                                                                    Proceso: <?= $proceso->proceso_nombre;?>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="proceso_<?= $proceso->proceso_id;?>" class="panel-collapse collapse">
                                                            <div class="panel-body">



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach ?>

                                            <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach ?>

                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>

            </div>
        </div>



        </div>
    </div>

</div>