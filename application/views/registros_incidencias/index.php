<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Registros</li>
        <li>Orientado a Procesos</li>
        <li class="active">Registros de Incidencias</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Incidencias
                <a href="<?= base_url(); ?>registros_incidencias/agregar" class="btn btn-info pull-right">
                    <i class="fa fa-plus"></i> Agregar registro de incidencia
                </a>
            </h2>
            <?= $this->session->flashdata('message');?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed">
                <thead>
                    <th>Id</th>
                    <th>Origen</th>
                    <th>Fecha Creación</th>
                    <th>Responsable detección</th>
                    <th>Asunto</th>
                    <th>Responsable solución</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach ($incidencias as $i): ?>
                        <tr>
                            <td><?= $i->incidencia_id;?></td>
                            <td><?= $i->origen_incidencia;?></td>
                            <td><?= $i->fecha_creacion_incidencia;?></td>
                            <td><?= responsable($i->responsable_deteccion_fk);?></td>
                            <td><?= $i->asunto_incidencia;?></td>
                            <td><?= responsable($i->responsable_solucion_fk);?></td>
                            <td><?= estado_incidencia($i->estado_incidencia_fk);?></td>
                            <td>
                              <a href="<?= base_url(); ?>registros_incidencias/editar/<?= $i->incidencia_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
                                <i class="fa fa-pencil"></i>
                              </a>

                              <a class="btn btn-danger btn-small delete hastip" data-id="<?= $i->incidencia_id;?>" title="Eliminar registro">
                                <i class="fa fa-remove"></i>
                              </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<script>


$('.delete').on('click', function(e){
    e.preventDefault();

    var data_id = $(this).data('id');

    swal({
      title: "Estás seguro?",
      text: "No podrás recuperar un registro eliminado",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
      closeOnConfirm: false
    },
    function(){
        window.location = _URL + 'registros_incidencias/eliminar/' + data_id;
    });

});



</script>