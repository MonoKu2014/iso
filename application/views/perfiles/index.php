<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Administración</li>
  <li class="active">Perfiles</li>
</ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Perfiles
                <a href="<?= base_url(); ?>perfiles/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar perfil
                </a>
                <a href="<?= base_url(); ?>perfiles/exportar" class="btn btn-info pull-right">
                    <i class="fa fa-file-excel-o"></i> Exportar
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
    				<th>Perfil</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($perfiles as $p): ?>
    					<tr>
    						<td><?= $p->perfil_id;?></td>
    						<td><?= $p->perfil;?></td>
    						<td>
    						  <a href="<?= base_url(); ?>perfiles/editar/<?= $p->perfil_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
    						  	<i class="fa fa-pencil"></i>
    						  </a>

    						  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $p->perfil_id;?>" title="Eliminar registro">
    						  	<i class="fa fa-remove"></i>
    						  </a>

                              <a href="<?= base_url(); ?>perfiles/permisos/<?= $p->perfil_id;?>" class="btn btn-success btn-small hastip" title="Editar permisos">
                                <i class="fa fa-filter"></i>
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
        window.location = _URL + 'perfiles/eliminar/' + data_id;
	});

});


$('.deactivate').on('click', function(e){
    e.preventDefault();
    var data_id = $(this).data('id');
    window.location = _URL + 'perfiles/desactivar/' + data_id;
});


$('.activate').on('click', function(e){
    e.preventDefault();
    var data_id = $(this).data('id');
    window.location = _URL + 'perfiles/activar/' + data_id;
});



</script>