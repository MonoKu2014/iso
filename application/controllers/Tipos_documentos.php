<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos_documentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('tipos_documentos_Model', 'tipo_documento');
    }


	public function index()
	{	
        $data['tipos_documentos'] = $this->tipo_documento->obtener_tipos_documentos();
        $this->load->view('layout/header');
		$this->load->view('tipos_documentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $this->load->view('layout/header');
        $this->load->view('tipos_documentos/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('tipo_documento', 'Tipo_documento', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'tipo_documento'    => $this->input->post('tipo_documento')
            );

            $insert = $this->tipo_documento->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'tipos_documentos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'tipos_documentos');
        }
    }



    public function editar($id)
    {   
        $data['tipo_documento'] = $this->tipo_documento->obtener_tipo_documento($id);
        $this->load->view('layout/header');
        $this->load->view('tipos_documentos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('tipo_documento', 'Tipo_documento', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'tipo_documento'    => $this->input->post('tipo_documento')
            );

            $update = $this->tipo_documento->editar($data, $this->input->post('tipo_documento_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'tipos_documentos/editar/'.$this->input->post('tipo_documento_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'tipos_documentos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->tipo_documento->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'tipos_documentos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'tipos_documentos');
        }

    }


}
