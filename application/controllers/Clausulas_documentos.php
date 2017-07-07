<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clausulas_documentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('clausulas_documentos_Model', 'clausula_documento');
    }


	public function index()
	{	
        $data['clausulas_documentos'] = $this->clausula_documento->obtener_clausulas_documentos();
        $this->load->view('layout/header');
		$this->load->view('clausulas_documentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $this->load->view('layout/header');
        $this->load->view('clausulas_documentos/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('clausula_documento_codigo', 'Clausula_documento_codigo', 'required');
        $this->form_validation->set_rules('clausula_documento', 'Clausula_documento', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'clausula_documento_codigo'     => $this->input->post('clausula_documento_codigo'),
                'clausula_documento'            => $this->input->post('clausula_documento')
            );

            $insert = $this->clausula_documento->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'clausulas_documentos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'clausulas_documentos');
        }
    }



    public function editar($id)
    {   
        $data['clausula_documento'] = $this->clausula_documento->obtener_clausula_documento($id);
        $this->load->view('layout/header');
        $this->load->view('clausulas_documentos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        
        $this->form_validation->set_rules('clausula_documento_codigo', 'Clausula_documento_codigo', 'required');
        $this->form_validation->set_rules('clausula_documento', 'Clausula_documento', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'clausula_documento_codigo'     => $this->input->post('clausula_documento_codigo'),
                'clausula_documento'            => $this->input->post('clausula_documento')
            );

            $update = $this->clausula_documento->editar($data, $this->input->post('clausula_documento_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'clausulas_documentos/editar/'.$this->input->post('clausula_documento_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'clausulas_documentos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->clausula_documento->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'clausulas_documentos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'clausulas_documentos');
        }

    }


}
