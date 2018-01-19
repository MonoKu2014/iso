<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Estructura</li>
        <li class="active">Indicadores</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Indicadores
                <a href="<?= base_url(); ?>indicadores_calidad/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar indicador
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
    				<th>Código Indicador</th>
                    <th>Nombre</th>
                    <th>Objetivo</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($indicadores as $i): ?>
    					<tr>
    						<td><?= $i->indicador_id;?></td>
    						<td><?= $i->indicador_codigo;?></td>
                            <td><?= $i->indicador_nombre;?></td>
                            <td><?= $i->indicador_objetivo;?></td>
    						<td>

							  <a href="<?= base_url(); ?>indicadores_calidad/editar/<?= $i->indicador_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $i->indicador_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'indicadores_calidad/eliminar/' + data_id;
	});

});



</script>