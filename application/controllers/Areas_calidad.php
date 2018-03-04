<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_calidad extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('areas_Calidad_Model', 'area');
    }


	public function index()
	{
        $data['areas'] = $this->area->obtener_areas();
        $this->load->view('layout/header');
		$this->load->view('areas_calidad/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('areas_calidad/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('area', 'Area', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area'    => $this->input->post('area'),
                'area_tipo'    => $this->input->post('tipo')
            );

            $insert = $this->area->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'areas_calidad/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'areas_calidad');
        }
    }



    public function editar($id)
    {
        $data['area'] = $this->area->obtener_area($id);
        $this->load->view('layout/header');
        $this->load->view('areas_calidad/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('area', 'Area', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area'    => $this->input->post('area'),
                'area_tipo'    => $this->input->post('tipo')
            );

            $update = $this->area->editar($data, $this->input->post('area_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'areas_calidad/editar/'.$this->input->post('area_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'areas_calidad');
        }
    }



    public function eliminar($id)
    {

        if($this->area->tiene_procesos($id) > 0){
            $this->session->set_flashdata('message', alert_danger('No puede eliminar el área, ya que tiene secciones asociadas'));
            redirect(base_url().'areas_calidad');
        }

        $delete = $this->area->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'areas_calidad');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'areas_calidad');
        }

    }


    public function exportar()
    {

        $usuarios = $this->area->consulta_exportar()->result();

        $cabeceras = $this->area->consulta_exportar()->list_fields();

        $nombre_archivo = 'Areas_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $usuarios, $cabeceras);

    }



}
