<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('areas_Model', 'area');
    }


	public function index()
	{
        $data['areas'] = $this->area->obtener_areas();
        $this->load->view('layout/header');
		$this->load->view('areas/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('areas/agregar');
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
                'area'    => $this->input->post('area')
            );

            $insert = $this->area->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'areas/agregar');
        } else {
            $texto = 'Se agrega una nueva área: ' . $this->input->post('area');
            insertar_traza(fecha(), hora(), $this->session->id, 'areas', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'areas');
        }
    }



    public function editar($id)
    {
        $data['area'] = $this->area->obtener_area($id);
        $this->load->view('layout/header');
        $this->load->view('areas/editar', $data);
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
                'area'    => $this->input->post('area')
            );

            $update = $this->area->editar($data, $this->input->post('area_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'areas/editar/'.$this->input->post('area_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'areas');
        }
    }



    public function eliminar($id)
    {

        if($this->area->tiene_procesos($id) > 0){
            $this->session->set_flashdata('message', alert_danger('No puede eliminar el área, ya que tiene secciones asociadas'));
            redirect(base_url().'areas');
        }

        $delete = $this->area->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'areas');
        } else {
            $texto = 'Se elimina área con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'areas', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'areas');
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
