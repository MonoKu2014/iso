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


    public function permisos($id)
    {
        $data['perfil'] = $this->perfil->obtener_perfil($id);
        $data['modulos_administracion'] = $this->perfil->obtener_modulos_administracion($id);
        $data['modulos_parametros'] = $this->perfil->obtener_modulos_parametros($id);
        $this->load->view('layout/header');
        $this->load->view('perfiles/permisos', $data);
        $this->load->view('layout/footer');
    }


}
