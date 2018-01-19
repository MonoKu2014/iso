<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Parámetros</li>
  <li>Indicadores</li>
  <li class="active">Tipo Datos</li>
</ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Tipos de datos
                <a href="<?= base_url(); ?>tipo_datos/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar Tipo dato
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
    				<?php foreach ($tipos as $t): ?>
    					<tr>
    						<td><?= $t->tipo_dato_id;?></td>
    						<td><?= $t->tipo_dato;?></td>
    						<td>

							  <a href="<?= base_url(); ?>tipo_datos/editar/<?= $t->tipo_dato_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $t->tipo_dato_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'tipo_datos/eliminar/' + data_id;
	});

});



</script>