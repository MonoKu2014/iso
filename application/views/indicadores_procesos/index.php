<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Estructura</li>
        <li class="active">Indicadores Procesos</li>
    </ol>

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Indicadores Proceso
                <a href="<?= base_url(); ?>indicadores_procesos/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar indicador Procseso
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
    				<th>Valor Indicador</th>
                    <th>Fecha</th>
                    <th>Observación</th>                   
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($indicadores_procesos as $i): ?>
    					<tr>
    						<td><?= $i->indicador_proceso_id;?></td>
    						<td><?= $i->indicador_proceso_indicador;?></td>
                            <td><?= $i->indicador_proceso_fecha;?></td>
                            <td><?= $i->indicador_proceso_observacion;?></td>                            
    						<td>

							  <a href="<?= base_url(); ?>indicadores_procesos/editar/<?= $i->indicador_proceso_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $i->indicador_proceso_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'indicadores_procesos/eliminar/' + data_id;
	});

});



</script>