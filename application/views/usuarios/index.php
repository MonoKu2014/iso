<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Usuarios

                <?php if(can_access('crear', 1)){ ?>
                    <a href="<?= base_url(); ?>usuarios/agregar" class="btn btn-info pull-right">
                    	<i class="fa fa-plus"></i> Agregar usuario
                    </a>
                <?php } ?>

                <?php if(can_access('exportar', 1)){ ?>
                    <a href="<?= base_url(); ?>usuarios/exportar" class="btn btn-info pull-right">
                        <i class="fa fa-file-excel-o"></i> Exportar
                    </a>
                <?php } ?>
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

                              <?php if(can_access('editar', 1)){ ?>
    						  <a href="<?= base_url(); ?>usuarios/editar/<?= $u->usuario_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
    						  	<i class="fa fa-pencil"></i>
    						  </a>
                              <?php } ?>

                              <?php if(can_access('eliminar', 1)){ ?>
    						  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $u->usuario_id;?>" title="Eliminar registro">
    						  	<i class="fa fa-remove"></i>
    						  </a>
                              <?php } ?>

                              <?php if($u->estado_fk == 1){ ?>
    							  <a class="btn btn-warning btn-small deactivate hastip" data-id="<?= $u->usuario_id;?>" title="Desactivar registro">
    							  	<i class="fa fa-power-off"></i>
    							  </a>
                              <?php } else { ?>
                                  <a class="btn btn-success btn-small activate hastip" data-id="<?= $u->usuario_id;?>" title="Activar registro">
                                    <i class="fa fa-power-off"></i>
                                  </a>
                              <?php } ?>
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