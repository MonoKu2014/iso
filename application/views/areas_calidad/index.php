<div class="container-fluid">


<ol class="breadcrumb">
  <li><a href="<?= base_url();?>panel">Dashboard</a></li>
  <li>Estructura</li>
  <li class="active">Contexto y Organización</li>
</ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Contexto y Organización
                <a href="<?= base_url(); ?>areas_calidad/agregar" class="btn btn-info pull-right">
                	<i class="fa fa-plus"></i> Agregar Contexto y Organización
                </a>
                <a href="<?= base_url(); ?>areas_calidad/exportar" class="btn btn-info pull-right">
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
                    <th>Tipo</th>
    				<th>Acciones</th>
    			</thead>
    			<tbody>
    				<?php foreach ($areas as $a): ?>
    					<tr>
    						<td><?= $a->area_id;?></td>
    						<td><?= $a->area;?></td>
                            <td>
                                <?= ($a->area_tipo == 1) ? 'Contexto' : 'Organización'; ?>
                            </td>
    						<td>

							  <a href="<?= base_url(); ?>areas_calidad/editar/<?= $a->area_id;?>" class="btn btn-info btn-small hastip" title="Editar registro">
							  	<i class="fa fa-pencil"></i>
							  </a>

							  <a class="btn btn-danger btn-small delete hastip" data-id="<?= $a->area_id;?>" title="Eliminar registro">
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
        window.location = _URL + 'areas_calidad/eliminar/' + data_id;
	});

});



</script>