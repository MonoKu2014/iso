<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Documentos
                <a href="<?= base_url(); ?>documentos/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar documento
                </a>
                <a href="<?= base_url(); ?>documentos/exportar" class="btn btn-info pull-right">
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
    				<th>Nombre</th>
                    <th>Cláusula</th>
                    <th>Área</th>
                    <th>Sección</th>
                    <th>Tipo.Doc</th>
                    <th>Copia</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($documentos as $d): ?>
    					<tr>
    						<td><?= $d->documento_id;?></td>
    						<td><?= $d->documento;?></td>
                            <td><?= $d->clausula_documento;?></td>
                            <td><?= $d->area;?></td>
                            <td><?= $d->seccion;?></td>
                            <td><?= $d->tipo_documento;?></td>
                            <td><?= copia($d->copia);?></td>
    						<td>

							  <a href="<?= base_url(); ?>documentos/editar/<?= $d->documento_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $d->documento_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'documentos/eliminar/' + data_id;
	});

});



</script>