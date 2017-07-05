<?php defined('BASEPATH') OR exit('No direct script access allowed');


//si no hay sesion, lo redirijo al inicio donde esta el login
function validate_session()
{
	$ci =& get_instance();
    if($ci->session->id == ''){
    	$message = 'Debe iniciar sesión para acceder a este contenido';
    	$ci->session->set_flashdata('message', alert_danger($message));
        redirect(base_url());
    }
}

//para imprimir la última consulta que se realiza a la base de datos y poder depurar bien una query
function query_logger()
{
	$ci =& get_instance();
	dd($ci->db->last_query());	
}


//funciona igual que el dd de laravel
function dd($var)
{
	var_dump($var);
	die();
}


function alert_success($text)
{
	return '<div class="alert alert-success"><i class="fa fa-check"></i> '.$text.'</div>';
}

function alert_danger($text)
{
	return '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> '.$text.'</div>';
}

function alert_info($text)
{
	return '<div class="alert alert-info"><i class="fa fa-info-circle"></i> '.$text.'</div>';
}


function active($controller)
{
	$ci =& get_instance();

	$nav = change_nav($ci->router->class);

	if($nav == $controller){
		return 'class="active"';
	}

	return '';
}


function change_nav($controller)
{
	if($controller == 'departamentos' || $controller == 'cargos'){
		return 'responsables';
	}

	if($controller == 'areas' || $controller == 'procesos' || $controller == 'secciones' || $controller == 'indicadores'){
		return 'procesos';
	}

	if($controller == 'tipos_documentos' || $controller == 'formatos_documentos' || $controller == 'clausulas_documentos'){
		return 'documentos';
	}

	if($controller == 'datos' || $controller == 'tipo_datos'){
		return 'indicadores';
	}

	if($controller == 'usuarios'){
		return 'usuarios';
	}

	if($controller == 'panel'){
		return 'panel';
	}

}