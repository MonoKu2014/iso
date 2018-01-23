<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calidad_indicadores extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('calidad_indicadores_Model', 'registro_indicador');
    }


	public function index()
	{
        $data['indicadores'] = $this->registro_indicador->obtener_calidad_indicadores();
        $this->load->view('layout/header');
		$this->load->view('calidad_indicadores/index', $data);
        $this->load->view('layout/footer');
	}



    public function agregar()
    {
        $data['areas'] = $this->registro_indicador->areas();
        $this->load->view('layout/header');
        $this->load->view('calidad_indicadores/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

        $error = 0;
        $this->form_validation->set_rules('codigo', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('observaciones', '', 'required');
        $this->form_validation->set_rules('valor_dato_superior', '', 'required');
        $this->form_validation->set_rules('valor_dato_inferior', '', 'required');
        $this->form_validation->set_rules('indicador_final', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {
            $data = array(
                'indicador_codigo'              => $this->input->post('codigo'),
                'area_fk'                       => $this->input->post('area'),
                'seccion_fk'                    => $this->input->post('seccion'),
                'proceso_fk'                    => $this->input->post('proceso'),
                'indicador_observaciones'       => $this->input->post('observaciones'),
                'valor_dato_superior'           => $this->input->post('valor_dato_superior'),
                'valor_dato_inferior'           => $this->input->post('valor_dato_inferior'),
                'valor_indicador'               => $this->input->post('indicador_final'),
                'fecha_indicador'               => $this->input->post('fecha')
            );

            $insert = $this->registro_indicador->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'calidad_indicadores/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'calidad_indicadores');
        }

    }



    public function eliminar($id)
    {
        $delete = $this->registro_indicador->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'calidad_indicadores');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'calidad_indicadores');
        }
    }


    public function editar($id)
    {
        $data['areas'] = $this->registro_indicador->areas();
        $data['indicador'] = $this->registro_indicador->obtener_registro_indicador($id);
        $this->load->view('layout/header');
        $this->load->view('calidad_indicadores/editar', $data);
        $this->load->view('layout/footer');
    }



    public function guardar_edicion()
    {

        $error = 0;
        $this->form_validation->set_rules('codigo', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('observaciones', '', 'required');
        $this->form_validation->set_rules('valor_dato_superior', '', 'required');
        $this->form_validation->set_rules('valor_dato_inferior', '', 'required');
        $this->form_validation->set_rules('indicador_final', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {
            $data = array(
                'indicador_codigo'              => $this->input->post('codigo'),
                'area_fk'                       => $this->input->post('area'),
                'seccion_fk'                    => $this->input->post('seccion'),
                'proceso_fk'                    => $this->input->post('proceso'),
                'indicador_observaciones'       => $this->input->post('observaciones'),
                'valor_dato_superior'           => $this->input->post('valor_dato_superior'),
                'valor_dato_inferior'           => $this->input->post('valor_dato_inferior'),
                'valor_indicador'               => $this->input->post('indicador_final'),
                'fecha_indicador'               => $this->input->post('fecha')
            );

            $insert = $this->registro_indicador->editar($data, $this->input->post('indicador_id'));
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'calidad_indicadores/editar/'.$this->input->post('indicador_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'calidad_indicadores');
        }

    }


}
