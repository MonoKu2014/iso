<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('departamentos_Model', 'departamento');
    }


	public function index()
	{
        $data['departamentos'] = $this->departamento->obtener_departamentos();
        $this->load->view('layout/header');
		$this->load->view('departamentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('departamentos/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('departamento', 'Departamento', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'departamento'    => $this->input->post('departamento')
            );

            $insert = $this->departamento->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'departamentos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'departamentos');
        }
    }



    public function editar($id)
    {
        $data['departamento'] = $this->departamento->obtener_departamento($id);
        $this->load->view('layout/header');
        $this->load->view('departamentos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('departamento', 'Departamento', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'departamento'    => $this->input->post('departamento')
            );

            $update = $this->departamento->editar($data, $this->input->post('departamento_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'departamentos/editar/'.$this->input->post('departamento_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'departamentos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->departamento->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'departamentos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'departamentos');
        }

    }


    public function exportar()
    {

        $datos = $this->departamento->consulta_exportar()->result();

        $cabeceras = $this->departamento->consulta_exportar()->list_fields();

        $nombre_archivo = 'Departamentos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }


}
