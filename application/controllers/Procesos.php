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
        $data['estados'] = $this->proceso->obtener_estados();
        $data['responsables'] = $this->proceso->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('procesos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;

        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('codigo', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('nombre', '', 'required');
        $this->form_validation->set_rules('objetivo', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area_fk'           => $this->input->post('area'),
                'seccion_fk'        => $this->input->post('seccion'),
                'responsable_fk'    => $this->input->post('responsable'),
                'estado_fk'         => $this->input->post('estado'),
                'proceso_nombre'    => $this->input->post('nombre'),
                'proceso_objetivo'  => $this->input->post('objetivo'),
                'proceso_codigo'    => $this->input->post('codigo')
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
            $texto = 'Se agrega un nuevo proceso: ' . $this->input->post('nombre');
            insertar_traza(fecha(), hora(), $this->session->id, 'procesos', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'procesos');
        }
    }



    public function editar($id)
    {
        $data['proceso'] = $this->proceso->obtener_proceso($id);
        $data['areas'] = $this->proceso->areas();
        $data['estados'] = $this->proceso->obtener_estados();
        $data['responsables'] = $this->proceso->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('procesos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;

        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('codigo', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('nombre', '', 'required');
        $this->form_validation->set_rules('objetivo', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area_fk'           => $this->input->post('area'),
                'seccion_fk'        => $this->input->post('seccion'),
                'responsable_fk'    => $this->input->post('responsable'),
                'estado_fk'         => $this->input->post('estado'),
                'proceso_nombre'    => $this->input->post('nombre'),
                'proceso_objetivo'  => $this->input->post('objetivo'),
                'proceso_codigo'    => $this->input->post('codigo')
            );

            $update = $this->proceso->editar($data, $this->input->post('proceso_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'procesos/editar/'.$this->input->post('proceso_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
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
            $texto = 'Se elimina proceso con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'procesos', 'Eliminar', $texto, 1, $id);
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
