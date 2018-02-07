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
    <script src="<?= base_url(); ?>assets/jquery-ui/jquery-ui.min.js"></script>
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

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/jquery-ui/jquery-ui.min.css">
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

                <li <?= active('panel')?>>
                    <a href="<?= base_url(); ?>panel">
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                    </a>
                </li>


                <li <?= active('elementos')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#elementos"><i class="fa fa-sitemap"></i> Elementos <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="elementos" class="collapse">
                    <li><a href="<?= base_url(); ?>responsables">Responsables</a></li>
                        <li><a href="<?= base_url(); ?>documentos">Documentos</a></li>
                    </ul>
                </li>



                <li <?= active('procesos')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#procesos"><i class="fa fa-folder-open"></i> Estructura <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="procesos" class="collapse">

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#orientada_procesos">
                            <i class="fa fa-caret-right"></i> Orientada a Procesos</a>
                            <ul id="orientada_procesos" class="collapse">
                                <li><a class="last" href="<?= base_url(); ?>areas">Áreas</a></li>
                                <li><a class="last" href="<?= base_url(); ?>secciones">Secciones</a></li>
                                <li><a class="last" href="<?= base_url(); ?>procesos">Procesos</a></li>
                                <li><a class="last" href="<?= base_url(); ?>indicadores">Indicadores</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#orientada_calidad">
                            <i class="fa fa-caret-right"></i> Orientada a Calidad</a>
                            <ul id="orientada_calidad" class="collapse">
                                <li><a class="last" href="<?= base_url(); ?>areas_calidad">Contexto y Organización</a></li>
                                <li><a class="last" href="<?= base_url(); ?>secciones_calidad">Riesgos y Oportunidades</a></li>
                                <li><a class="last" href="<?= base_url(); ?>objetivos">Indicadores</a></li>
                                <!--<li><a class="last" href="<?= base_url(); ?>indicadores_calidad">Indicadores</a></li>-->
                            </ul>
                        </li>

                    </ul>
                </li>


                <li <?= active('parametros')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#parametros"><i class="fa fa-bar-chart"></i> Parámetros <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="parametros" class="collapse">

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#responsables_down">
                            <i class="fa fa-caret-right"></i> Responsables</a>
                            <ul id="responsables_down" class="collapse">
                                <li><a class="last" href="<?= base_url(); ?>departamentos">Departamentos</a></li>
                                <li><a class="last" href="<?= base_url(); ?>cargos">Cargos</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#documentos_down">
                            <i class="fa fa-caret-right"></i> Documentos</a>
                            <ul id="documentos_down" class="collapse">
                                <li><a class="last" href="<?= base_url(); ?>clausulas_documentos">Claúsulas</a></li>
                                <li><a class="last" href="<?= base_url(); ?>formatos_documentos">Formatos</a></li>
                                <li><a class="last" href="<?= base_url(); ?>tipos_documentos">Tipos</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#indicadores_down">
                            <i class="fa fa-caret-right"></i> Indicadores</a>
                            <ul id="indicadores_down" class="collapse">
                                <li><a class="last" href="<?= base_url(); ?>tipo_datos">Tipos Datos</a></li>
                                <li><a class="last" href="<?= base_url(); ?>datos">Datos</a></li>
                                <li><a class="last" href="<?= base_url(); ?>frecuencias">Frecuencias</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#incidencias_down">
                            <i class="fa fa-caret-right"></i> Incidencias</a>
                            <ul id="incidencias_down" class="collapse">
                                <li><a class="last" href="<?= base_url(); ?>estados_incidencias">Estados</a></li>
                                <li><a class="last" href="<?= base_url(); ?>tipos_incidencias">Tipos</a></li>
                                <li><a class="last" href="<?= base_url(); ?>origenes_incidencias">Origen</a></li>
                                <li><a class="last" href="<?= base_url(); ?>causas_incidencias">Causas</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>



                <li <?= active('registros')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#registros">
                        <i class="fa fa-file-o"></i> Registros <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="registros" class="collapse">

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#registros_procesos">
                            <i class="fa fa-caret-right"></i> Orientada a Procesos</a>
                            <ul id="registros_procesos" class="collapse">
                                <li><a class="last" href="<?= base_url();?>registros_indicadores">Registro de Indicadores</a></li>
                                <li><a class="last" href="<?= base_url();?>registros_incidencias">Registro de Incidencias</a></li>
                                <li><a class="last" href="<?= base_url(); ?>accion_mejoras">Acciones de Mejoras</a></li>
                                <li><a class="last" href="<?= base_url(); ?>modificacion_documentos">Modificación Documentos</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#registros_calidad">
                            <i class="fa fa-caret-right"></i> Orientada a Calidad</a>
                            <ul id="registros_calidad" class="collapse">
                                <li><a class="last" href="<?= base_url();?>calidad_indicadores">Registro de Indicadores</a></li>
                                <!--<li><a class="last" href="<?= base_url();?>calidad_incidencias">Registro de Incidencias</a></li>
                                <li><a class="last" href="<?= base_url(); ?>calidad_mejoras">Acciones de Mejoras</a></li></li>-->
                            </ul>
                        </li>

                    </ul>
                </li>



                <!--<li <?= active('consultas')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#consultas">
                        <i class="fa fa-cog"></i> Consultas <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="consultas" class="collapse">
                        <li><a href="<?= base_url(); ?>">Reporte 1</a></li>
                        <li><a href="<?= base_url(); ?>">Reporte 2</a></li>
                    </ul>
                </li>-->


                <li <?= active('administracion')?>>
                    <a href="javascript:;" data-toggle="collapse" data-target="#administracion">
                        <i class="fa fa-cogs"></i> Administración <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="administracion" class="collapse">
                        <?php if(can_see(1)){ ?>
                        <li><a href="<?= base_url(); ?>usuarios">Usuarios</a></li>
                        <?php } ?>

                        <?php if(can_see(2)){ ?>
                        <li><a href="<?= base_url(); ?>perfiles">Perfiles</a></li>
                        <?php } ?>
                    </ul>
                </li>




                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>