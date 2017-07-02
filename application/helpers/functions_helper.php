<?php defined('BASEPATH') OR exit('No direct script access allowed');


//si no hay sesion, lo redirijo al inicio donde esta el login
function validate_session()
{
	$ci =& get_instance();
    if($ci->session->logged_in === false){
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