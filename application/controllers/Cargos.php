<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('cargos_Model', 'cargo');
    }


	public function index()
	{
        $data['cargos'] = $this->cargo->obtener_cargos();
        $this->load->view('layout/header');
		$this->load->view('cargos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('cargos/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'cargo'    => $this->input->post('cargo')
            );

            $insert = $this->cargo->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'cargos/agregar');
        } else {
            $texto = 'Se agrega un nuevo cargo: ' . $this->input->post('cargo');
            insertar_traza(fecha(), hora(), $this->session->id, 'cargos', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'cargos');
        }
    }



    public function editar($id)
    {
        $data['cargo'] = $this->cargo->obtener_cargo($id);
        $this->load->view('layout/header');
        $this->load->view('cargos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'cargo'    => $this->input->post('cargo')
            );

            $update = $this->cargo->editar($data, $this->input->post('cargo_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'cargos/editar/'.$this->input->post('cargo_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'cargos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->cargo->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'cargos');
        } else {
            $texto = 'Se elimina cargo con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'cargos', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'cargos');
        }

    }


    public function exportar()
    {

        $datos = $this->cargo->consulta_exportar()->result();

        $cabeceras = $this->cargo->consulta_exportar()->list_fields();

        $nombre_archivo = 'Cargos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
