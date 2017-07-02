<div class="container-fluid">

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Usuarios
                <a href="<?= base_url(); ?>usuarios/agregar" class="btn btn-default pull-right">
                	<i class="fa fa-plus"></i> Agregar usuario
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
    				<th>Email</th>
    				<th>Perfil</th>
    				<th>Estado</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($usuarios as $u): ?>
    					<tr>
    						<td><?= $u->usuario_id;?></td>
    						<td><?= $u->usuario_nombre;?></td>
    						<td><?= $u->usuario_email;?></td>
    						<td><?= $u->perfil;?></td>
    						<td><?= $u->estado;?></td>
    						<td>

								<div class="btn-group">
								  <a href="<?= base_url(); ?>usuarios/editar/<?= $u->usuario_id;?>" class="btn btn-default btn-small hastip" title="Editar registro">
								  	<i class="fa fa-pencil"></i>
								  </a>

								  <a class="btn btn-default btn-small delete hastip" data-id="<?= $u->usuario_id;?>" title="Eliminar registro">
								  	<i class="fa fa-remove"></i>
								  </a>

                                  <?php if($u->estado_fk == 1){ ?>
    								  <a class="btn btn-default btn-small deactivate hastip" data-id="<?= $u->usuario_id;?>" title="Desactivar registro">
    								  	<i class="fa fa-toggle-off"></i>
    								  </a>
                                  <?php } else { ?>
                                      <a class="btn btn-default btn-small activate hastip" data-id="<?= $u->usuario_id;?>" title="Activar registro">
                                        <i class="fa fa-toggle-on"></i>
                                      </a>
                                  <?php } ?>
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
        window.location = _URL + 'usuarios/eliminar/' + data_id;
	});

});


$('.deactivate').on('click', function(e){
    e.preventDefault();
    var data_id = $(this).data('id');
    window.location = _URL + 'usuarios/desactivar/' + data_id;
});


$('.activate').on('click', function(e){
    e.preventDefault();
    var data_id = $(this).data('id');
    window.location = _URL + 'usuarios/activar/' + data_id;
});



</script>