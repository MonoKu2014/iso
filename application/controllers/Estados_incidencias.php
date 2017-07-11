<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados_incidencias extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('estados_incidencias_Model', 'estado_incidencia');
    }


	public function index()
	{	
        $data['estados_incidencias'] = $this->estado_incidencia->obtener_estados_incidencias();
        $this->load->view('layout/header');
		$this->load->view('estados_incidencias/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $this->load->view('layout/header');
        $this->load->view('estados_incidencias/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('estado_incidencia', 'Estado_incidencia', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'estado_incidencia'    => $this->input->post('estado_incidencia')
            );

            $insert = $this->estado_incidencia->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'estados_incidencias/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'estados_incidencias');
        }
    }



    public function editar($id)
    {   
        $data['estado_incidencia'] = $this->estado_incidencia->obtener_estado_incidencia($id);
        $this->load->view('layout/header');
        $this->load->view('estados_incidencias/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('estado_incidencia', 'Estado_incidencia', 'required');

        if($this->form_validation->run() === FALSE){
            
            $error = 1;

        } else {
            
            $data = array(
                'estado_incidencia'    => $this->input->post('estado_incidencia')
            );

            $update = $this->estado_incidencia->editar($data, $this->input->post('estado_incidencia_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'estados_incidencias/editar/'.$this->input->post('estado_incidencia_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'estados_incidencias');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->estado_incidencia->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'estados_incidencias');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'estados_incidencias');
        }

    }


}
