<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trazabilidad extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('trazabilidad_Model', 'traza');
    }


    public function index()
    {
        $data['trazabilidad'] = $this->traza->obtener_trazas($this->session->id);
        $this->load->view('layout/header');
        $this->load->view('trazabilidad/index', $data);
        $this->load->view('layout/footer');
    }


    public function detalle($id)
    {
        $data['traza'] = $this->traza->obtener_traza_por_id($id);
        $this->load->view('layout/header');
        $this->load->view('trazabilidad/detalle', $data);
        $this->load->view('layout/footer');
    }

}
