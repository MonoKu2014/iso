<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('indicadores_Model', 'indicador');
    }


	public function index()
	{
        $data['indicadores'] = $this->indicador->obtener_indicadores();
        $this->load->view('layout/header');
		$this->load->view('indicadores/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('indicadores/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('indicador', 'Indicador', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'indicador'    => $this->input->post('indicador')
            );

            $insert = $this->indicador->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'indicadores/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'indicadores');
        }
    }



    public function editar($id)
    {
        $data['indicador'] = $this->indicador->obtener_indicador($id);
        $this->load->view('layout/header');
        $this->load->view('indicadores/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('indicador', 'Indicador', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'indicador'    => $this->input->post('indicador')
            );

            $update = $this->indicador->editar($data, $this->input->post('indicador_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'indicadores/editar/'.$this->input->post('indicador_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'indicadores');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->indicador->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'indicadores');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'indicadores');
        }

    }


    public function exportar()
    {

        $datos = $this->indicador->consulta_exportar()->result();

        $cabeceras = $this->indicador->consulta_exportar()->list_fields();

        $nombre_archivo = 'Indicadores_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
