<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modificacion_documentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('modificacion_documentos_Model', 'modificacion_documento');
    }


	public function index()
	{
        $data['modificacion_documentos'] = $this->modificacion_documento->obtener_modificacion_documentos();
        $this->load->view('layout/header');
		$this->load->view('modificacion_documentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['areas'] = $this->modificacion_documento->areas();
        $data['estados'] = $this->modificacion_documento->obtener_estados();
        $data['responsables'] = $this->modificacion_documento->obtener_responsables();
        $this->load->view('layout/header');
        $this->load->view('modificacion_documentos/agregar', $data);
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

            $insert = $this->modificacion_documento->insertar($data);

            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'modificacion_documentos/agregar');
        } else {
            $texto = 'Se agrega una nueva modificación documento: ' . $this->input->post('justificacion');
            insertar_traza(fecha(), hora(), $this->session->id, 'solicitud_documento', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'modificacion_documentos');
        }
    }



    public function editar($id)
    {
        $data['solicitud'] = $this->modificacion_documento->obtener_documento($id);
        $data['areas'] = $this->modificacion_documento->areas();
        $data['documentos'] = $this->modificacion_documento->obtener_documentos();
        $data['responsables'] = $this->modificacion_documento->obtener_responsables();
        $data['estados'] = $this->modificacion_documento->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('modificacion_documentos/editar', $data);
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

            $update = $this->modificacion_documento->editar($data, $this->input->post('solicitud_doc_id'));

            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'modificacion_documentos/editar/'.$this->input->post('solicitud_doc_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'modificacion_documentos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->modificacion_documento->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'modificacion_documentos');
        } else {
            $texto = 'Se elimina modificación documento con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'solicitud_documento', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'modificacion_documentos');
        }

    }


    public function exportar()
    {

        $datos = $this->modificacion_documento->consulta_exportar()->result();

        $cabeceras = $this->modificacion_documento->consulta_exportar()->list_fields();

        $nombre_archivo = 'Modificacion_documentos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
