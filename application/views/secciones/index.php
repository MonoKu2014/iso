<div class="container-fluid">

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Secciones
                <a href="<?= base_url(); ?>secciones/agregar" class="btn btn-default pull-right">
                	<i class="fa fa-plus"></i> Agregar sección
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
    				<th>Sección</th>
                    <th>Responsable</th>
                    <th>Área</th>
                    <th>Frecuencia</th>
                    <th>Genera indicador</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($secciones as $s): ?>
    					<tr>
    						<td><?= $s->seccion_id;?></td>
    						<td><?= $s->seccion;?></td>
                            <td><?= $s->usuario_nombre;?></td>
                            <td><?= $s->area;?></td>
                            <td><?= $s->frecuencia;?></td>
                            <td><?= ($s->seccion_genera == 1) ? 'Sí' : 'No'; ?></td>
    						<td>

								<div class="btn-group">
								  <a href="<?= base_url(); ?>secciones/editar/<?= $s->seccion_id;?>" class="btn btn-default btn-small hastip" title="Editar registro">
								  	<i class="fa fa-pencil"></i>
								  </a>

								  <a class="btn btn-default btn-small delete hastip" data-id="<?= $s->seccion_id;?>" title="Eliminar registro">
								  	<i class="fa fa-remove"></i>
								  </a>
								</div>

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
        window.location = _URL + 'secciones/eliminar/' + data_id;
	});

});



</script>