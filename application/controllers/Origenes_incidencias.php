<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Origenes_incidencias extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('origenes_incidencias_Model', 'origen_incidencia');
    }


	public function index()
	{	
        $data['origenes_incidencias'] = $this->origen_incidencia->obtener_origenes_incidencias();
        $this->load->view('layout/header');
		$this->load->view('origenes_incidencias/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $this->load->view('layout/header');
        $this->load->view('origenes_incidencias/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('origen_incidencia', 'Origen_incidencia', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'origen_incidencia'    => $this->input->post('origen_incidencia')
            );

            $insert = $this->origen_incidencia->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'origenes_incidencias/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'origenes_incidencias');
        }
    }



    public function editar($id)
    {   
        $data['origen_incidencia'] = $this->origen_incidencia->obtener_origen_incidencia($id);
        $this->load->view('layout/header');
        $this->load->view('origenes_incidencias/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('origen_incidencia', 'Origen_incidencia', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'origen_incidencia'    => $this->input->post('origen_incidencia')
            );

            $update = $this->origen_incidencia->editar($data, $this->input->post('origen_incidencia_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'origenes_incidencias/editar/'.$this->input->post('origen_incidencia_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'origenes_incidencias');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->origen_incidencia->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'origenes_incidencias');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'origenes_incidencias');
        }

    }


}
