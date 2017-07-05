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
                 
                    <li><a href="<?= base_url(); ?>panel"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?= base_url(); ?>usuarios"><i class="fa fa-users"></i> Usuarios</a></li>
                 

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#indicadores"><i class="fa fa-bar-chart"></i> Indicadores <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="indicadores" class="collapse">
                            <li><a href="<?= base_url(); ?>datos">Datos</a></li>
                            <li><a href="<?= base_url(); ?>tipo_datos">Tipos de datos</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#documentos"><i class="fa fa-file"></i> Documentos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="documentos" class="collapse">
                            <li><a href="<?= base_url(); ?>tipos">Tipos</a></li>
                            <li><a href="<?= base_url(); ?>formatos">Formatos</a></li>
                            <li><a href="<?= base_url(); ?>clausulas">Claúsulas</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#procesos"><i class="fa fa-folder-open"></i> Procesos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="procesos" class="collapse">
                            <li><a href="<?= base_url(); ?>areas">Áreas</a></li>
                            <li><a href="<?= base_url(); ?>secciones">Secciones</a></li>
                            <li><a href="<?= base_url(); ?>procesos">Procesos</a></li>
                            <li><a href="<?= base_url(); ?>indicadores">Indicadores</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#responsables"><i class="fa fa-users"></i> Responsables <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="responsables" class="collapse">
                            <li><a href="<?= base_url(); ?>departamentos">Departamentos</a></li>
                            <li><a href="<?= base_url(); ?>cargos">Cargos</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>