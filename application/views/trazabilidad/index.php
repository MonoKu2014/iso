<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Consultas</li>
        <li class="active">Registro de trazabilidad de operaciones por usuario</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Registro de trazabilidad de operaciones por usuario
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed">
                <thead>
                    <th>Id</th>
                    <th>Transacción</th>
                    <th>Detalle</th>
                    <th>Fecha/Hora</th>
                    <th>Tabla</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($trazabilidad as $t): ?>
                        <tr>
                            <td><?= $t->traza_id;?></td>
                            <td><?= $t->traza_detalle;?></td>
                            <td><?= $t->traza_texto;?></td>
                            <td><?= $t->traza_fecha;?> <?= $t->traza_hora;?></td>
                            <td><?= $t->traza_tabla;?></td>
                            <td>
                              <a href="<?= base_url(); ?>trazabilidad/detalle/<?= $t->traza_id;?>" class="btn btn-info btn-small hastip" title="Ver registro">
                                <i class="fa fa-pencil"></i>
                              </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>