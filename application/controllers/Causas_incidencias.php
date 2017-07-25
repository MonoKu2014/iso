<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Causas_incidencias extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('causas_incidencias_Model', 'causa_incidencia');
    }


	public function index()
	{
        $data['causas_incidencias'] = $this->causa_incidencia->obtener_causas_incidencias();
        $this->load->view('layout/header');
		$this->load->view('causas_incidencias/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('causas_incidencias/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('causa_incidencia_codigo', 'causa_incidencia_codigo', 'required');
        $this->form_validation->set_rules('causa_incidencia', 'causa_incidencia', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'causa_incidencia_codigo'     => $this->input->post('causa_incidencia_codigo'),
                'causa_incidencia'            => $this->input->post('causa_incidencia')
            );

            $insert = $this->causa_incidencia->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'causas_incidencias/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'causas_incidencias');
        }
    }



    public function editar($id)
    {
        $data['causa_incidencia'] = $this->causa_incidencia->obtener_causa_incidencia($id);
        $this->load->view('layout/header');
        $this->load->view('causas_incidencias/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;

        $this->form_validation->set_rules('causa_incidencia_codigo', 'Causa_incidencia_codigo', 'required');
        $this->form_validation->set_rules('causa_incidencia', 'Causa_incidencia', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'causa_incidencia_codigo'     => $this->input->post('causa_incidencia_codigo'),
                'causa_incidencia'            => $this->input->post('causa_incidencia')
            );

            $update = $this->causa_incidencia->editar($data, $this->input->post('causa_incidencia_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'causas_incidencias/editar/'.$this->input->post('causa_incidencia_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'causas_incidencias');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->causa_incidencia->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'causas_incidencias');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'causas_incidencias');
        }

    }


    public function exportar()
    {

        $datos = $this->causa_incidencia->consulta_exportar()->result();

        $cabeceras = $this->causa_incidencia->consulta_exportar()->list_fields();

        $nombre_archivo = 'Causas_Incidencias_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }


}
