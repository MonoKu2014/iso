<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos_incidencias extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('tipos_incidencias_Model', 'tipo_incidencia');
    }


	public function index()
	{	
        $data['tipos_incidencias'] = $this->tipo_incidencia->obtener_tipos_incidencias();
        $this->load->view('layout/header');
		$this->load->view('tipos_incidencias/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $this->load->view('layout/header');
        $this->load->view('tipos_incidencias/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('tipo_incidencia', 'Tipo_incidencia', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'tipo_incidencia'    => $this->input->post('tipo_incidencia')
            );

            $insert = $this->tipo_incidencia->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'tipos_incidencias/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'tipos_incidencias');
        }
    }



    public function editar($id)
    {   
        $data['tipo_incidencia'] = $this->tipo_incidencia->obtener_tipo_incidencia($id);
        $this->load->view('layout/header');
        $this->load->view('tipos_incidencias/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('tipo_incidencia', 'Tipo_incidencia', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'tipo_incidencia'    => $this->input->post('tipo_incidencia')
            );

            $update = $this->tipo_incidencia->editar($data, $this->input->post('tipo_incidencia_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'tipos_incidencias/editar/'.$this->input->post('tipo_incidencia_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'tipos_incidencias');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->tipo_incidencia->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'tipos_incidencias');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'tipos_incidencias');
        }

    }


}
