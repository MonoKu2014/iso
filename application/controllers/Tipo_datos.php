<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_datos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('tipos_Model', 'tipo');
    }


	public function index()
	{	
        $data['tipos'] = $this->tipo->obtener_tipos();
        $this->load->view('layout/header');
		$this->load->view('tipos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $this->load->view('layout/header');
        $this->load->view('tipos/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('tipo', 'tipo', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'tipo'    => $this->input->post('tipo')
            );

            $insert = $this->tipo->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'tipos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'tipos');
        }
    }



    public function editar($id)
    {   
        $data['tipo'] = $this->tipo->obtener_tipo($id);
        $this->load->view('layout/header');
        $this->load->view('tipos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('tipo', 'tipo', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'tipo'    => $this->input->post('tipo')
            );

            $update = $this->tipo->editar($data, $this->input->post('tipo_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'tipos/editar/'.$this->input->post('tipo_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'tipos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->tipo->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'tipos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'tipos');
        }

    }


}
