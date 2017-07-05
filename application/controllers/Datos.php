<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('datos_Model', 'dato');
    }


	public function index()
	{	
        $data['datos'] = $this->dato->obtener_datos();
        $this->load->view('layout/header');
		$this->load->view('datos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $data['areas'] = $this->dato->areas();
        $this->load->view('layout/header');
        $this->load->view('datos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

    }



    public function editar($id)
    {   
        $data['dato'] = $this->dato->obtener_dato($id);
        $this->load->view('layout/header');
        $this->load->view('datos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {

    }



    public function eliminar($id)
    {
        $delete = $this->dato->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'datos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'datos');
        }

    }


}
