<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('datos_Model', 'dato');
    }


	public function index()
	{
        $data['datos'] = $this->dato->obtener_datos();
        $this->load->view('layout/header');
		$this->load->view('datos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['areas'] = $this->dato->areas();
        $data['tipos_datos'] = $this->dato->tipos_datos();
        $this->load->view('layout/header');
        $this->load->view('datos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('codigo', 'Código', 'required');
        $this->form_validation->set_rules('area', 'Área', 'required');
        $this->form_validation->set_rules('seccion', 'Sección', 'required');
        $this->form_validation->set_rules('proceso', 'Proceso', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'dato_codigo'   => $this->input->post('codigo'),
                'area_fk'       => $this->input->post('area'),
                'seccion_fk'    => $this->input->post('seccion'),
                'proceso_fk'    => $this->input->post('proceso'),
                'dato_nombre'   => $this->input->post('nombre'),
                'tipo_dato_fk'  => $this->input->post('tipo')
            );

            $insert = $this->dato->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'datos/agregar');
        } else {
            $texto = 'Se agrega un nuevo dato: ' . $this->input->post('nombre');
            insertar_traza(fecha(), hora(), $this->session->id, 'datos', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'datos');
        }
    }



    public function editar($id)
    {
        $data['areas'] = $this->dato->areas();
        $data['tipos_datos'] = $this->dato->tipos_datos();
        $data['dato'] = $this->dato->obtener_dato($id);
        $this->load->view('layout/header');
        $this->load->view('datos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('codigo', 'Código', 'required');
        $this->form_validation->set_rules('area', 'Área', 'required');
        $this->form_validation->set_rules('seccion', 'Sección', 'required');
        $this->form_validation->set_rules('proceso', 'Proceso', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'dato_codigo'   => $this->input->post('codigo'),
                'area_fk'       => $this->input->post('area'),
                'seccion_fk'    => $this->input->post('seccion'),
                'proceso_fk'    => $this->input->post('proceso'),
                'dato_nombre'   => $this->input->post('nombre'),
                'tipo_dato_fk'  => $this->input->post('tipo')
            );

            $insert = $this->dato->editar($data, $this->input->post('dato_id'));
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'datos/editar/'.$this->input->post('dato_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'datos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->dato->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'datos');
        } else {
            $texto = 'Se elimina dato con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'datos', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'datos');
        }

    }



    public function exportar()
    {

        $datos = $this->dato->consulta_exportar()->result();

        $cabeceras = $this->dato->consulta_exportar()->list_fields();

        $nombre_archivo = 'Datos_Indicadores_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }


}
