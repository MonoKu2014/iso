<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objetivos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('objetivos_Model', 'objetivo');
    }


    public function index()
    {
        $data['objetivos'] = $this->objetivo->obtener_objetivos();
        $this->load->view('layout/header');
        $this->load->view('objetivos/index', $data);
        $this->load->view('layout/footer');
    }


    public function agregar()
    {
        $data['areas'] = $this->objetivo->areas();
        $data['estados'] = $this->objetivo->obtener_estados();
        $data['responsables'] = $this->objetivo->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('objetivos/agregar', $data);
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
                'objetivo_nombre'    => $this->input->post('nombre'),
                'objetivo_objetivo'  => $this->input->post('objetivo'),
                'objetivo_codigo'    => $this->input->post('codigo')
            );

            $insert = $this->objetivo->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'objetivos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'objetivos');
        }
    }



    public function editar($id)
    {
        $data['objetivo'] = $this->objetivo->obtener_objetivo($id);
        $data['areas'] = $this->objetivo->areas();
        $data['estados'] = $this->objetivo->obtener_estados();
        $data['responsables'] = $this->objetivo->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('objetivos/editar', $data);
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
                'objetivo_nombre'    => $this->input->post('nombre'),
                'objetivo_objetivo'  => $this->input->post('objetivo'),
                'objetivo_codigo'    => $this->input->post('codigo')
            );

            $update = $this->objetivo->editar($data, $this->input->post('objetivo_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'objetivos/editar/'.$this->input->post('objetivo_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'objetivos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->objetivo->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'objetivos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'objetivos');
        }

    }


    public function exportar()
    {

        $datos = $this->objetivo->consulta_exportar()->result();

        $cabeceras = $this->objetivo->consulta_exportar()->list_fields();

        $nombre_archivo = 'objetivos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
