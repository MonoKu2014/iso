

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Editar los permisos del perfil <b>"<?= $perfil->perfil;?>"</b>
                <a href="<?= base_url(); ?>perfiles" class="btn btn-default pull-right">
                	<i class="fa fa-chevron-left"></i> Volver
                </a>
            </h2>
        </div>
    </div>


    <div class="row" id="permisos">
    	<div class="col-lg-12">
        <p>Los permisos serán cambiados automáticamente cada vez que pinche una casilla</p>

        <h4>Administración</h4>
        <table class="table table-bordered" id="not-table">
            <thead>
                <th>Módulo</th>
                <th>Accesar</th>
                <th>Agregar</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                <th>Exportar</th>
            </thead>
            <tbody>
                <?php foreach ($modulos_administracion as $ma): ?>
                <tr data-modulo="<?= $ma->modulo_id?>">
                    <td><b><?= $ma->modulo_nombre;?></b></td>

                    <td><input type="checkbox" value="1" <?= is_checked($ma->leer); ?> ></td>
                    <td><input type="checkbox" value="2" <?= is_checked($ma->crear); ?>></td>
                    <td><input type="checkbox" value="3" <?= is_checked($ma->editar); ?>></td>
                    <td><input type="checkbox" value="4" <?= is_checked($ma->eliminar); ?>></td>
                    <td><input type="checkbox" value="5" <?= is_checked($ma->exportar); ?>></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    	</div>


        <div class="col-lg-12">

        <h4>Parámetros</h4>
        <table class="table table-bordered" id="not-table">
            <thead>
                <th>Módulo</th>
                <th>Accesar</th>
                <th>Agregar</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                <th>Exportar</th>
            </thead>
            <tbody>
                <?php foreach ($modulos_parametros as $mp): ?>
                <tr data-modulo="<?= $mp->modulo_id?>">
                    <td><b><?= $mp->modulo_nombre;?></b></td>

                    <td><input type="checkbox" value="1" <?= is_checked($mp->leer); ?> ></td>
                    <td><input type="checkbox" value="2" <?= is_checked($mp->crear); ?>></td>
                    <td><input type="checkbox" value="3" <?= is_checked($mp->editar); ?>></td>
                    <td><input type="checkbox" value="4" <?= is_checked($mp->eliminar); ?>></td>
                    <td><input type="checkbox" value="5" <?= is_checked($mp->exportar); ?>></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        </div>


    </div>

</div>

<script>

    var perfil_id = '<?php echo $perfil->perfil_id;?>';

    $('input[type="checkbox"]').on('click', function(){

        var modulo_id = $(this).parent().parent().data('modulo');
        var accion = $(this).val();

        $.ajax({
            type: 'post',
            url: _URL + 'ajax/guardar_permiso',
            data: { perfil_id:perfil_id, modulo_id:modulo_id, accion:accion },
            success: function(response){

            }
        });

    });
</script>