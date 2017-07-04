<!DOCTYPE html>
<html>
<head>
	<title>ISO Quality Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/sweetalert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/sweetalert/themes/google/google.css">

	<script src="<?= base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/tooltipsy.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/main.js"></script>

	<script>
		var _URL = '<?= base_url();?>';
	</script>

	<script src="<?= base_url(); ?>assets/js/validate.js"></script>
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
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>usuarios"><i class="fa fa-users"></i> Usuarios</a>
                    </li>
                 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#indicadores"><i class="fa fa-bar-chart"></i> Indicadores <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="indicadores" class="collapse">
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
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


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>