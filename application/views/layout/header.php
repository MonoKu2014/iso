<!DOCTYPE html>
<html>
<head>
	<title>ISO Quality Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="<?= base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/tooltipsy.min.js"></script>
	<script src="<?= base_url(); ?>assets/data-tables/jquery.dataTables.js"></script>
	<script src="<?= base_url(); ?>assets/data-tables/dataTables.bootstrap.js"></script>
	<script src="<?= base_url(); ?>assets/js/main.js"></script>

	<script>
		var _URL = '<?= base_url();?>';
	</script>

	<script src="<?= base_url(); ?>assets/js/validate.js"></script>


	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/sweetalert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/sweetalert/themes/google/google.css">


	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/data-tables/dataTables.bootstrap.css">

</head>
<body>



    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <i class="fa fa-align-justify"></i>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>panel">
                	<em>Iso Quality</em>
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    	<i class="fa fa-user"></i> Bienvenido: <?= $this->session->nombre; ?>
                    	<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url(); ?>cuenta"><i class="fa fa-fw fa-user"></i> Mi cuenta</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url(); ?>login/salir"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                <li <?= active('panel')?> >
                    <a href="<?= base_url(); ?>panel">
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                    </a>
                </li>

                <?php if(can_see(1)){ ?>
                <li <?= active('usuarios')?> >
                    <a href="<?= base_url(); ?>usuarios">
                        <i class="fa fa-users"></i> Usuarios
                    </a>
                </li>
                <?php } ?>


                <?php if(can_see(1)){ ?>
                <li <?= active('perfiles')?> >
                    <a href="<?= base_url(); ?>perfiles">
                        <i class="fa fa-gears"></i> Perfiles
                    </a>
                </li>
                <?php } ?>


                <li <?= active('indicadores')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#indicadores"><i class="fa fa-bar-chart"></i> Indicadores <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="indicadores" class="collapse">
                        <li><a href="<?= base_url(); ?>datos">Datos</a></li>
                        <li><a href="<?= base_url(); ?>tipo_datos">Tipos de datos</a></li>
                        <li><a href="<?= base_url(); ?>frecuencias">Frecuencias</a></li>
                    </ul>
                </li>


                <li <?= active('documentos')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#documentos"><i class="fa fa-file"></i> Documentos <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="documentos" class="collapse">
                        <li><a href="<?= base_url(); ?>tipos_documentos">Tipos</a></li>
                        <li><a href="<?= base_url(); ?>formatos_documentos">Formatos</a></li>
                        <li><a href="<?= base_url(); ?>clausulas_documentos">Claúsulas</a></li>
                    </ul>
                </li>


                <li <?= active('procesos')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#procesos"><i class="fa fa-folder-open"></i> Procesos <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="procesos" class="collapse">
                        <li><a href="<?= base_url(); ?>areas">Áreas</a></li>
                        <li><a href="<?= base_url(); ?>secciones">Secciones</a></li>
                        <li><a href="<?= base_url(); ?>procesos">Procesos</a></li>
                        <li><a href="<?= base_url(); ?>indicadores">Indicadores</a></li>
                    </ul>
                </li>


                <li <?= active('responsables')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#responsables"><i class="fa fa-users"></i> Responsables <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="responsables" class="collapse">
                        <li><a href="<?= base_url(); ?>departamentos">Departamentos</a></li>
                        <li><a href="<?= base_url(); ?>cargos">Cargos</a></li>
                        <li><a href="<?= base_url(); ?>responsables">Responsables</a></li>
                    </ul>
                </li>


                <li <?= active('incidencias')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#incidencias"><i class="fa fa-arrow-circle-up"></i> Incidencias <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="incidencias" class="collapse">
                        <li><a href="<?= base_url(); ?>estados_incidencias">Estados</a></li>
                        <li><a href="<?= base_url(); ?>tipos_incidencias">Tipos</a></li>
                        <li><a href="<?= base_url(); ?>origenes_incidencias">Origen</a></li>
                        <li><a href="<?= base_url(); ?>causas_incidencias">Causas</a></li>
                    </ul>
                </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>