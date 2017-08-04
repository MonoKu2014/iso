<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('documentos_Model', 'documentos');
    }


	public function index()
	{
        $data['documentos'] = $this->documentos->obtener_documentos();
        $this->load->view('layout/header');
		$this->load->view('documentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['clausulas'] = $this->documentos->obtener_clausulas();
        $data['areas'] = $this->documentos->obtener_areas();
        $this->load->view('layout/header');
        $this->load->view('documentos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

    }



    public function editar($id)
    {

    }


    public function guardar_edicion()
    {

    }



    public function eliminar($id)
    {
        $delete = $this->documentos->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'documentoss');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'documentoss');
        }

    }


}
