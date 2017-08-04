<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate sesion es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('secciones_Model', 'secciones');
    }


	public function index()
	{
        $data['secciones'] = $this->secciones->obtener_secciones();
        $this->load->view('layout/header');
		$this->load->view('secciones/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['areas'] = $this->secciones->obtener_areas();
        $data['estados'] = $this->secciones->obtener_estados();
        $data['frecuencias'] = $this->secciones->obtener_frecuencias();
        $data['responsables'] = $this->secciones->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('secciones/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('secciones', 'secciones', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'secciones'    => $this->input->post('secciones')
            );

            $insert = $this->secciones->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->sesion->set_flashdata('mesage', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'secciones/agregar');
        } else {
            $this->sesion->set_flashdata('mesage', alert_succes('Registro creado con éxito'));
            redirect(base_url().'secciones');
        }
    }



    public function editar($id)
    {
        $data['secciones'] = $this->secciones->obtener_secciones($id);
        $this->load->view('layout/header');
        $this->load->view('secciones/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('secciones', 'secciones', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'secciones'    => $this->input->post('secciones')
            );

            $update = $this->secciones->editar($data, $this->input->post('secciones_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->sesion->set_flashdata('mesage', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'secciones/editar/'.$this->input->post('secciones_id'));
        } else {
            $this->sesion->set_flashdata('mesage', alert_succes('Registro actualizado con éxito'));
            redirect(base_url().'secciones');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->secciones->eliminar($id);
        if($delete === false){
            $this->sesion->set_flashdata('mesage', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'secciones');
        } else {
            $this->sesion->set_flashdata('mesage', alert_succes('Registro eliminado con éxito'));
            redirect(base_url().'secciones');
        }

    }


}
