<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calidad_indicadores extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
    }


	public function index()
	{
        $this->load->view('layout/header');
		$this->load->view('calidad_indicadores/index');
        $this->load->view('layout/footer');
	}




}
