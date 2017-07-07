<div class="container-fluid">

 
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Claúsulas Documentos
                <a href="<?= base_url(); ?>clausulas_documentos/agregar" class="btn btn-default pull-right">
                	<i class="fa fa-plus"></i> Agregar Claúsula Documento
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
                    <th>Codigo Claúsula</th>
    				<th>Nombre</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($clausulas_documentos as $a): ?>
    					<tr>
    						<td><?= $a->clausula_documento_id;?></td>
                            <td><?= $a->clausula_documento_codigo;?></td>
    						<td><?= $a->clausula_documento;?></td>
    						<td>

								<div class="btn-group">
								  <a href="<?= base_url(); ?>clausulas_documentos/editar/<?= $a->clausula_documento_id;?>" class="btn btn-default btn-small hastip" title="Editar registro">
								  	<i class="fa fa-pencil"></i>
								  </a>

								  <a class="btn btn-default btn-small delete hastip" data-id="<?= $a->clausula_documento_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'clausulas_documentos/eliminar/' + data_id;
	});

});



</script>