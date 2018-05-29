<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frecuencias extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('frecuencias_Model', 'frecuencia');
    }


	public function index()
	{
        $data['frecuencias'] = $this->frecuencia->obtener_frecuencias();
        $this->load->view('layout/header');
		$this->load->view('frecuencias/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('frecuencias/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('frecuencia', 'Frecuencia', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'frecuencia'    => $this->input->post('frecuencia')
            );

            $insert = $this->frecuencia->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'frecuencias/agregar');
        } else {
            $texto = 'Se agrega una nueva frecuencia: ' . $this->input->post('frecuencia');
            insertar_traza(fecha(), hora(), $this->session->id, 'frecuencias', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'frecuencias');
        }
    }



    public function editar($id)
    {
        $data['frecuencia'] = $this->frecuencia->obtener_frecuencia($id);
        $this->load->view('layout/header');
        $this->load->view('frecuencias/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('frecuencia', 'Frecuencia', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'frecuencia'    => $this->input->post('frecuencia')
            );

            $update = $this->frecuencia->editar($data, $this->input->post('frecuencia_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'frecuencias/editar/'.$this->input->post('frecuencia_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'frecuencias');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->frecuencia->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'frecuencias');
        } else {
            $texto = 'Se elimina frecuencia con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'frecuencias', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'frecuencias');
        }

    }


}
