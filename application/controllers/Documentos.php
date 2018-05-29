<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('documentos_Model', 'documentos');
    }


	public function index()
	{
        $data['documentos'] = $this->documentos->obtener_documentos();
        $this->load->view('layout/header');
		$this->load->view('documentos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['clausulas'] = $this->documentos->obtener_clausulas();
        $data['areas'] = $this->documentos->obtener_areas();
        $data['tipos_documentos'] = $this->documentos->obtener_tipos_documentos();
        $data['responsables'] = $this->documentos->obtener_responsables();
        $data['estados_documentos'] = $this->documentos->obtener_estados_documentos();
        $this->load->view('layout/header');
        $this->load->view('documentos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

        $error = 0;
        $this->form_validation->set_rules('documento', '', 'required');
        $this->form_validation->set_rules('clausula', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('tipo_documento', '', 'required');
        $this->form_validation->set_rules('responsable_preparar', '', 'required');
        $this->form_validation->set_rules('responsable_publicar', '', 'required');
        $this->form_validation->set_rules('vigencia', '', 'required');
        $this->form_validation->set_rules('publicacion', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $copia    = $_FILES['copia'];
            $temporal = $copia['tmp_name'];
            $imagen   = $copia['name'];

            if($imagen != ''){
                $directorio = 'assets/documentos/';
                copy($temporal, $directorio.$imagen);
            }

            $data = array(
                'documento'             => $this->input->post('documento'),
                'clausula_fk'           => $this->input->post('clausula'),
                'area_fk'               => $this->input->post('area'),
                'seccion_fk'            => $this->input->post('seccion'),
                'tipo_documento_fk'     => $this->input->post('tipo_documento'),
                'responsable_preparar'  => $this->input->post('responsable_preparar'),
                'responsable_publicar'  => $this->input->post('responsable_publicar'),
                'copia'                 => $imagen,
                'version'               => $this->input->post('version'),
                'fecha_vigencia'        => $this->input->post('vigencia'),
                'fecha_publicacion'     => $this->input->post('publicacion'),
                'estado_documento'      => 'Activo',
                'palabras_claves'       => $this->input->post('claves'),
                'observacion'           => $this->input->post('observacion')
            );

            $insert = $this->documentos->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'documentos/agregar');
        } else {
            $texto = 'Se agrega un nuevo documento: ' . $this->input->post('documento');
            insertar_traza(fecha(), hora(), $this->session->id, 'documentos', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'documentos');
        }


    }



    public function editar($id)
    {
        $data['documento'] = $this->documentos->obtener_documento($id);
        $data['clausulas'] = $this->documentos->obtener_clausulas();
        $data['areas'] = $this->documentos->obtener_areas();
        $data['tipos_documentos'] = $this->documentos->obtener_tipos_documentos();
        $data['responsables'] = $this->documentos->obtener_responsables();
        $data['estados_documentos'] = $this->documentos->obtener_estados_documentos();
        $this->load->view('layout/header');
        $this->load->view('documentos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('documento', '', 'required');
        $this->form_validation->set_rules('clausula', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('tipo_documento', '', 'required');
        $this->form_validation->set_rules('responsable_preparar', '', 'required');
        $this->form_validation->set_rules('responsable_publicar', '', 'required');
        $this->form_validation->set_rules('vigencia', '', 'required');
        $this->form_validation->set_rules('publicacion', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $copia      = $_FILES['copia'];
            $temporal   = $copia['tmp_name'];
            $imagen     = $copia['name'];

            if($imagen != ''){
                $directorio = 'assets/documentos/';
                copy($temporal, $directorio.$imagen);
            } else {
                $imagen = $this->input->post('copia_actual');
            }

            $data = array(
                'documento'             => $this->input->post('documento'),
                'clausula_fk'           => $this->input->post('clausula'),
                'area_fk'               => $this->input->post('area'),
                'seccion_fk'            => $this->input->post('seccion'),
                'tipo_documento_fk'     => $this->input->post('tipo_documento'),
                'responsable_preparar'  => $this->input->post('responsable_preparar'),
                'responsable_publicar'  => $this->input->post('responsable_publicar'),
                'copia'                 => $imagen,
                'version'               => $this->input->post('version'),
                'fecha_vigencia'        => $this->input->post('vigencia'),
                'fecha_publicacion'     => $this->input->post('publicacion'),
                'estado_documento'      => 'Activo',
                'palabras_claves'       => $this->input->post('claves'),
                'observacion'           => $this->input->post('observacion')
            );

            $update = $this->documentos->editar($data, $this->input->post('documento_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'documentos/editar/'.$this->input->post('documento_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'documentos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->documentos->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'documentos');
        } else {
            $texto = 'Se elimina documento con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'documentos', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'documentos');
        }

    }


}
