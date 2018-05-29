<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formatos_documentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('formatos_documentos_Model', 'formato_documento');
    }


	public function index()
	{
        $data['formatos_documentos'] = $this->formato_documento->obtener_formatos_documentos();
        $this->load->view('layout/header');
		$this->load->view('formatos_documentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('formatos_documentos/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('formato_documento', 'formato_documento', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'formato_documento'    => $this->input->post('formato_documento')
            );

            $insert = $this->formato_documento->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'formatos_documentos/agregar');
        } else {
            $texto = 'Se agrega un nuevo formato documento: ' . $this->input->post('formato_documento');
            insertar_traza(fecha(), hora(), $this->session->id, 'formatos_documentos', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'formatos_documentos');
        }
    }



    public function editar($id)
    {
        $data['formato_documento'] = $this->formato_documento->obtener_formato_documento($id);
        $this->load->view('layout/header');
        $this->load->view('formatos_documentos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('formato_documento', 'formato_documento', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'formato_documento'    => $this->input->post('formato_documento')
            );

            $update = $this->formato_documento->editar($data, $this->input->post('formato_documento_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'formatos_documentos/editar/'.$this->input->post('formato_documento_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'formatos_documentos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->formato_documento->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'formatos_documentos');
        } else {
            $texto = 'Se elimina formato de documento con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'formatos_documentos', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'formatos_documentos');
        }

    }


}
