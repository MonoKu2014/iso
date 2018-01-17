<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accion_mejoras extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('Accion_mejoras_Model', 'accion_mejora');
    }


	public function index()
	{
        $data['accion_mejoras'] = $this->accion_mejora->obtener_accion_mejoras();
        $this->load->view('layout/header');
		$this->load->view('accion_mejoras/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $data['incidencias'] = $this->accion_mejora->obtener_inicidencias();
        $data['estados'] = $this->accion_mejora->obtener_estados();
        $data['responsables'] = $this->accion_mejora->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('accion_mejoras/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        //var_dump($this->input->post());
        //var_dump($this->input->post());
        //exit();

        $error = 0;

        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('documento', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');        
        $this->form_validation->set_rules('version', '', 'required');
        $this->form_validation->set_rules('nueva_version', '', 'required');        
        $this->form_validation->set_rules('fecha_modificacion', '', '');
        $this->form_validation->set_rules('justificacion', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {            

            $data = array(
                'area_fk'               => $this->input->post('area'),
                'seccion_fk'            => $this->input->post('seccion'),
                'documento_fk'          => $this->input->post('documento'),
                'responsable_fk'        => $this->input->post('responsable'),
                'version_actual'        => $this->input->post('version'),
                'version_nueva'         => $this->input->post('nueva_version'),
                'fecha_modificacion'    => $this->input->post('fecha_modificacion'),
                'justificacion'         => $this->input->post('justificacion'),
                'estado_fk'             => $this->input->post('estado')
            );            

            $insert = $this->accion_mejora->insertar($data);
            
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'accion_mejoras/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'accion_mejoras');
        }
    }



    public function editar($id)
    {
        $data['solicitud'] = $this->accion_mejora->obtener_mejora($id);
        $data['areas'] = $this->accion_mejora->areas();
        $data['documentos'] = $this->accion_mejora->obtener_documentos();
        $data['responsables'] = $this->accion_mejora->obtener_responsables();
        $data['estados'] = $this->accion_mejora->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('accion_mejoras/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('documento', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');        
        $this->form_validation->set_rules('version', '', 'required');
        $this->form_validation->set_rules('nueva_version', '', 'required');        
        $this->form_validation->set_rules('fecha_modificacion', '', '');
        $this->form_validation->set_rules('justificacion', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area_fk'               => $this->input->post('area'),
                'seccion_fk'            => $this->input->post('seccion'),
                'documento_fk'          => $this->input->post('documento'),
                'responsable_fk'        => $this->input->post('responsable'),
                'version_actual'        => $this->input->post('version'),
                'version_nueva'         => $this->input->post('nueva_version'),
                'fecha_modificacion'    => $this->input->post('fecha_modificacion'),
                'justificacion'         => $this->input->post('justificacion'),
                'estado_fk'             => $this->input->post('estado')
            );

            $update = $this->accion_mejora->editar($data, $this->input->post('solicitud_doc_id'));
            
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'accion_mejoras/editar/'.$this->input->post('solicitud_doc_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'accion_mejoras');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->accion_mejora->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'accion_mejoras');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'accion_mejoras');
        }

    }


    public function exportar()
    {

        $datos = $this->accion_mejora->consulta_exportar()->result();

        $cabeceras = $this->accion_mejora->consulta_exportar()->list_fields();

        $nombre_archivo = 'accion_mejoras_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
