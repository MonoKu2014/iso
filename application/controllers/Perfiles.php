<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfiles extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('perfiles_Model', 'perfil');
    }


	public function index()
	{	
        $data['perfiles'] = $this->perfil->obtener_perfiles();
        $this->load->view('layout/header');
		$this->load->view('perfiles/index', $data);
        $this->load->view('layout/footer');
	}

}
