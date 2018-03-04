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
        return 'parametros';
    }
    if($controller == 'areas' || $controller == 'procesos' || $controller == 'secciones' || $controller == 'indicadores'){
        return 'procesos';
    }
    if($controller == 'tipos_documentos' || $controller == 'formatos_documentos' || $controller == 'clausulas_documentos'){
        return 'parametros';
    }
    if($controller == 'estados_incidencias' || $controller == 'tipos_incidencias' || $controller == 'origenes_incidencias' || $controller == 'causas_incidencias'){
        return 'parametros';
    }
    if($controller == 'datos' || $controller == 'tipo_datos'){
        return 'parametros';
    }

    if($controller == 'usuarios' || $controller == 'perfiles'){
        return 'administracion';
    }

    //para los que no necesitan un if
    return $controller;
}


//retorna la letra asociada a la columna de conteo del exportar a excel
function excel_final_letter($index)
{
	$letters = range('A', 'Z');
	return $letters[$index];
}


function header_correction($header)
{
	$find = strpos($header, '_');
	if($find){
		return str_replace('_', ' ', $header);
	}

	return $header;
}




function main_export($filename, $registers, $fields)
{

	$ci =& get_instance();

    $ci->load->library('Excel.php');

    $ci->excel->getProperties()->setCreator("ISO Quality")
                                 ->setTitle("Registros Exportados")
                                 ->setSubject("Registros Exportados");


    $ci->excel->setActiveSheetIndex(0);

    $col = 0;
    foreach ($fields as $field) {
        $ci->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, header_correction(strtoupper($field)));
        $col++;
    }

    $letters = 'A1:' . excel_final_letter($col - 1) . '1';


    $ci->excel->getActiveSheet()
        ->getStyle($letters)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('0066cb');

    $ci->excel->getActiveSheet()
        ->getStyle($letters)
        ->getFont()->setBold(false)
        ->setSize(12)
        ->getColor()->setRGB('FFFFFF');


    $ci->excel->setActiveSheetIndex(0);


    $row = 2;
    foreach($registers as $register)
    {
        $col = 0;
        foreach ($fields as $field)
        {
            $ci->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $register->$field);
            $col++;
        }

        $row++;
    }

    $ci->excel->getActiveSheet()->setTitle($filename);

    $ci->excel->setActiveSheetIndex(0);


    foreach ($ci->excel->getWorksheetIterator() as $worksheet) {
        $ci->excel->setActiveSheetIndex($ci->excel->getIndex($worksheet));
        $sheet = $ci->excel->getActiveSheet();
        $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);
        foreach ($cellIterator as $cell) {
            $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
        }
    }


    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($ci->excel, 'Excel2007');
    $objWriter->save('php://output');

}


function have_perm($id_profile, $controller)
{

    $ci =& get_instance();

    //$controller = $ci->router->fetch_class();

    $ci->db->where('perfil_fk', $id_profile);
    $ci->db->where('modulo_fk', $controller);
    $permissions = $ci->db->get('permisos')->row();

    return $permissions;

}


function can_access($action, $controller)
{

    $ci =& get_instance();
    $id_profile = $ci->session->perfil;

    $permissions = have_perm($id_profile, $controller);

    if(count($permissions) == 0){
        return false;
    }

    if($permissions->$action == 0){
        return false;
    }

    return true;

}


//si no tiene permisos de lectura, no le permito avanzar
function can_read($controller)
{
    $ci =& get_instance();
    //$controller = $ci->router->fetch_class();
    $id_profile = $ci->session->perfil;
    $ci->db->where('perfil_fk', $id_profile);
    $ci->db->where('modulo_fk', $controller);
    $permissions = $ci->db->get('permisos')->row();

    if($permissions->leer == 0){
        $message = 'Usted no tiene permisos para acceder a este contenido';
        $ci->session->set_flashdata('message', alert_danger($message));
        redirect(base_url().'panel/sin_permisos');
    }
}


function can_see($controller)
{

    $permissions = have_perm_menu($controller);

    if(count($permissions) == 0){
        return false;
    }

    if($permissions->leer == 0){
        return false;
    }

    return true;

}


function have_perm_menu($controller)
{

    $ci =& get_instance();
    $id_profile = $ci->session->perfil;
    $ci->db->where('perfil_fk', $id_profile);
    $ci->db->where('modulo_fk', $controller);
    $permissions = $ci->db->get('permisos')->row();
    return $permissions;

}


function is_checked($value)
{
    if($value == 1){
        return 'checked';
    }

    return '';
}


function cv($cv)
{
    if($cv == ''){
        return 'Sin CV';
    }

    return '<a target="_blank" href="'.base_url().'assets/curriculums/'.$cv.'">'.$cv.'</a>';
}


function foto($foto)
{
    if($foto == ''){
        return 'Sin foto';
    }

    return '<a target="_blank" href="'.base_url().'assets/fotos/'.$foto.'">'.$foto.'</a>';
}


function copia($copia)
{
    if($copia == ''){
        return 'Sin documento adjunto';
    }

    return '<a target="_blank" href="'.base_url().'assets/documentos/'.$copia.'">'.$copia.'</a>';
}


function responsable($id)
{
    $ci =& get_instance();
    $ci->db->where('responsable_id', $id);
    $responsable = $ci->db->get('responsables')->row();
    return $responsable->responsable;
}


function estado_incidencia($id)
{
    if($id == 1){
        return 'Iniciada';
    } elseif ($id == 2){
        return 'Suspendida';
    } else {
        return 'Finalizada';
    }

    return '';
}


function datos()
{
    $ci =& get_instance();
    return $ci->db->get('datos')->result();
}


function cantidad_documentos()
{
    $ci =& get_instance();
    return $ci->db->count_all_results('solicitud_documento');
}

function cantidad_usuarios()
{
    $ci =& get_instance();
    return $ci->db->count_all_results('usuarios');
}


function cantidad_mejoras()
{
    $ci =& get_instance();
    return $ci->db->count_all_results('accion_mejora');
}


function cantidad_incidencias()
{
    $ci =& get_instance();
    return $ci->db->count_all_results('incidencias');
}


function documentos_por_seccion($id)
{
    $ci =& get_instance();
    $ci->db->where('seccion_fk', $id);
    return $ci->db->count_all_results('documentos');
}


function random_color()
{
    return 'rgba('.mt_rand(0, 255).','.mt_rand(0, 255).','.mt_rand(0, 255).',1)';
}