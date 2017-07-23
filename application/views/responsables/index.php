<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Responsables
                <a href="<?= base_url(); ?>responsables/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar Responsable
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
                    <th>Responsable</th>
    				<th>Nombre</th>
                    <th>Título</th>
                    <th>Fono Particular</th>
                    <th>Email</th>
                    <th>CV</th>
                    <th>Imagen</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($responsables as $a): ?>
    					<tr>
    						<td><?= $a->responsable_id;?></td>
                            <td><?= $a->responsable_funcionario;?></td>
                            <td><?= $a->responsable;?></td>
                            <td><?= $a->responsable_titulo;?></td>
                            <td><?= $a->responsable_fono_particular;?></td>
    						<td><?= $a->responsable_email;?></td>
                            <td><?= $a->responsable_curriculum;?></td>
                            <td><?= $a->responsable_foto;?></td>
    						<td>

							  <a href="<?= base_url(); ?>responsables/editar/<?= $a->responsable_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $a->responsable_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'responsables/eliminar/' + data_id;
	});

});



</script>