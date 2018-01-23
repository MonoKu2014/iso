<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Registros</li>
        <li>Orientado a Calidad</li>
        <li class="active">Registros de Incidencias</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Incidencias
                <a href="<?= base_url(); ?>calidad_incidencias/agregar" class="btn btn-info pull-right">
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
        window.location = _URL + 'calidad_incidencias/eliminar/' + data_id;
    });

});



</script>