<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mejoras extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('mejoras_Model', 'mejora');
    }



    public function index()
    {
        $data['mejoras'] = $this->mejora->obtener_mejoras();
        $this->load->view('layout/header');
        $this->load->view('mejoras/index', $data);
        $this->load->view('layout/footer');
    }



    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('mejoras/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {



    }



    public function eliminar($id)
    {
        $delete = $this->mejora->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'mejoras');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'mejoras');
        }
    }


    public function editar($id)
    {

    }



    public function guardar_edicion()
    {



    }


}
