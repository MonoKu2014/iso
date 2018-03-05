<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Estructura</li>
        <li><a href="<?= base_url();?>secciones_calidad">Riesgos y Oportunidades</a></li>
        <li class="active">Listado Detalle Ejecución</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Listado Detalle Ejecución
                <a href="<?= base_url(); ?>detalles_ejecucion/agregar/<?= $id_riesgo_oportunidad; ?>" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar Detalle Ejecución
                </a>
            </h2>
            <?= $this->session->flashdata('message');?>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12 table-responsive">
    		<table class="table table-bordered table-striped table-hover table-condensed">
    			<thead>
    				<th>Id Riesgo-Oportunidad</th>
    				<th>Id Detalle ejecución</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Ejecución</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Observación</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
                    <?php foreach ($detalles_ejecucion as $det): ?>
                        <tr>
                            <td><?= $id_riesgo_oportunidad;?></td>
                            <td><?= $det->detalle_ejecucion_id;?></td>
                            <td><?= date("d-m-Y", strtotime($det->detalle_fecha_creacion));?></td>
                            <td><?= date("d-m-Y", strtotime($det->detalle_fecha_ejecucion));?></td>
                            <td><?= $det->detalle_descripcion;?></td>
                            <td><?= if($det->estado_ejecucion);?></td>
                            <td><?= $det->detalle_observacion;?></td>                            
                            <td>

                              <a href="<?= base_url(); ?>detalles_ejecucion/editar/<?= $det->detalle_ejecucion_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
                                <i class="fa fa-pencil"></i>
                              </a>

                              <a class="btn btn-danger btn-small delete hastip" data-id="<?= $det->detalle_ejecucion_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'detalles_ejecucion/eliminar/' + data_id;
	});

});



</script>