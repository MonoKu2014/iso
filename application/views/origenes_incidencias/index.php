<div class="container-fluid">

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Orígenes de Incidencias
                <a href="<?= base_url(); ?>origenes_incidencias/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar Origen de Incidencia
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
    				<th>Nombre</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($origenes_incidencias as $a): ?>
    					<tr>
    						<td><?= $a->origen_incidencia_id;?></td>
    						<td><?= $a->origen_incidencia;?></td>
    						<td>

							  <a href="<?= base_url(); ?>origenes_incidencias/editar/<?= $a->origen_incidencia_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $a->origen_incidencia_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'origenes_incidencias/eliminar/' + data_id;
	});

});



</script>