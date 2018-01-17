<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Estructura</li>
        <li class="active">Acción Mejoras</li>
    </ol>

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Listado Acciones de Mejora
                <a href="<?= base_url(); ?>accion_mejoras/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar Acción
                </a>
            </h2>
            <?= $this->session->flashdata('message');?>
        </div>
    </div>


    <div class="row">
    	<div class="col-lg-12 table-responsive">
    		<table class="table table-bordered table-striped table-hover table-condensed">
    			<thead>
    				<th>Nº Acción</th>
                    <th>Asunto</th>
                    <th>Justificación</th>                                       
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($accion_mejoras as $a): ?>
    					<tr>
    						<td><?= $a->accion_id;?></td>
    						<td><?= $a->acc_asunto;?></td>
                            <td><?= $a->acc_resultado;?></td>                           
    						<td>

							  <a href="<?= base_url(); ?>accion_mejoras/editar/<?= $a->accion_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $a->accion_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'accion_mejoras/eliminar/' + data_id;
	});

});



</script>