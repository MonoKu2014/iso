<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('ajax_Model', 'ajax');
    }


    public function secciones_por_area($id_area)
    {
        $secciones = $this->ajax->obtener_secciones_por_area($id_area);

        $select = '';

        if(count($secciones) == 0){
            $select .= '<option value="">Área sin secciones</option>';
        } else {
            $select .= '<option value="">Seleccione sección...</option>';
            foreach($secciones as $s){
                $select .= '<option value="'.$s->seccion_id.'">'.$s->seccion.'</option>';
            }
        }

        echo $select;

    }



    public function procesos_por_seccion($id_seccion)
    {
        $procesos = $this->ajax->obtener_procesos_por_seccion($id_seccion);

        $select = '';

        if(count($procesos) == 0){
            $select .= '<option value="">Sección sin procesos</option>';
        } else {
            $select .= '<option value="">Seleccione proceso...</option>';
            foreach($procesos as $p){
                $select .= '<option value="'.$p->proceso_id.'">'.$p->proceso_nombre.'</option>';
            }
        }

        echo $select;

    }



}
