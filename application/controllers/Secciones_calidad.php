<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones_calidad extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('secciones_Calidad_Model', 'secciones');
    }


    public function index()
    {
        $data['secciones'] = $this->secciones->obtener_secciones();
        $this->load->view('layout/header');
        $this->load->view('secciones_calidad/index', $data);
        $this->load->view('layout/footer');
    }


    public function agregar()
    {
        $data['areas'] = $this->secciones->obtener_areas();
        $data['estados'] = $this->secciones->obtener_estados();
        $data['frecuencias'] = $this->secciones->obtener_frecuencias();
        $data['responsables'] = $this->secciones->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('secciones_calidad/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

        $error = 0;
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('frecuencia', '', 'required');
        $this->form_validation->set_rules('nombre', '', 'required');
        $this->form_validation->set_rules('objetivo', '', 'required');
        $this->form_validation->set_rules('indicadores', '', 'required');


        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            (is_null($this->input->post('sin_proceso'))) ? $sin_proceso = 0 : $sin_proceso = 1;

            $data = array(
                'area_fk'           => $this->input->post('area'),
                'seccion'           => $this->input->post('seccion'),
                'responsable_fk'    => $this->input->post('responsable'),
                'estado_fk'         => $this->input->post('estado'),
                'frecuencia_fk'     => $this->input->post('frecuencia'),
                'seccion_nombre'    => $this->input->post('nombre'),
                'seccion_objetivo'  => $this->input->post('objetivo'),
                'seccion_genera'    => $this->input->post('indicadores'),
                'sin_proceso'       => $sin_proceso
            );

            $insert = $this->secciones->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'secciones_calidad/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'secciones_calidad');
        }
    }



    public function editar($id)
    {
        $data['seccion'] = $this->secciones->obtener_seccion($id);
        $data['areas'] = $this->secciones->obtener_areas();
        $data['estados'] = $this->secciones->obtener_estados();
        $data['frecuencias'] = $this->secciones->obtener_frecuencias();
        $data['responsables'] = $this->secciones->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('secciones_calidad/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('frecuencia', '', 'required');
        $this->form_validation->set_rules('nombre', '', 'required');
        $this->form_validation->set_rules('objetivo', '', 'required');
        $this->form_validation->set_rules('indicadores', '', 'required');


        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            (is_null($this->input->post('sin_proceso'))) ? $sin_proceso = 0 : $sin_proceso = 1;

            $data = array(
                'area_fk'           => $this->input->post('area'),
                'seccion'           => $this->input->post('seccion'),
                'responsable_fk'    => $this->input->post('responsable'),
                'estado_fk'         => $this->input->post('estado'),
                'frecuencia_fk'     => $this->input->post('frecuencia'),
                'seccion_nombre'    => $this->input->post('nombre'),
                'seccion_objetivo'  => $this->input->post('objetivo'),
                'seccion_genera'    => $this->input->post('indicadores'),
                'sin_proceso'       => $sin_proceso
            );

            $update = $this->secciones->editar($data, $this->input->post('seccion_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'secciones_calidad/editar/'.$this->input->post('seccion_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'secciones_calidad');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->secciones->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'secciones_calidad');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'secciones_calidad');
        }

    }


}
