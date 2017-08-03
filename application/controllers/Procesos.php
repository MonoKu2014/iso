<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procesos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('procesos_Model', 'proceso');
    }


	public function index()
	{
        $data['procesos'] = $this->proceso->obtener_procesos();
        $this->load->view('layout/header');
		$this->load->view('procesos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $data['areas'] = $this->proceso->areas();
        $this->load->view('layout/header');
        $this->load->view('procesos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('proceso', 'Proceso', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'proceso'    => $this->input->post('proceso')
            );

            $insert = $this->proceso->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'procesos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'procesos');
        }
    }



    public function editar($id)
    {
        $data['proceso'] = $this->proceso->obtener_proceso($id);
        $this->load->view('layout/header');
        $this->load->view('procesos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('proceso', 'Proceso', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'proceso'    => $this->input->post('proceso')
            );

            $update = $this->proceso->editar($data, $this->input->post('proceso_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'procesos/editar/'.$this->input->post('proceso_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'procesos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->proceso->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'procesos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'procesos');
        }

    }


    public function exportar()
    {

        $datos = $this->proceso->consulta_exportar()->result();

        $cabeceras = $this->proceso->consulta_exportar()->list_fields();

        $nombre_archivo = 'Procesos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
