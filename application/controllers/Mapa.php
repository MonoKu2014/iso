<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('areas_Model', 'areas');
    }


    public function index()
    {
        $data['areas'] = $this->areas->obtener_areas();
        $this->load->view('layout/header');
        $this->load->view('mapa/index', $data);
        $this->load->view('layout/footer');
    }

}
