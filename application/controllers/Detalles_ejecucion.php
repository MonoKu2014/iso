<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalles_ejecucion extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('Detalles_Ejecucion_Model', 'detalle_ejecucion');
    }


	public function index($id)
	{
        $data['detalles_ejecucion'] = $this->detalle_ejecucion->obtener_detalles_ejecucion($id);
        $data['id_riesgo_oportunidad'] = $id;
        $this->load->view('layout/header');
		$this->load->view('detalles_ejecucion/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar($id)
    {   
        $data['estados'] = $this->detalle_ejecucion->obtener_estados();
        $data['id_riesgo_oportunidad'] = $id;
        $this->load->view('layout/header');
        $this->load->view('detalles_ejecucion/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;

        $this->form_validation->set_rules('fecha_ejecucion', '', 'required');
        $this->form_validation->set_rules('descripcion', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('observacion', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $fecha_actual = date("Y-m-d");

            $fecha_ejecucion = date("Y-m-d", strtotime($this->input->post('fecha_ejecucion')));

            $data = array(

                'riesgo_oportunidad_fk'     => $this->input->post('id_riesgo'),
                'detalle_fecha_creacion'    => $fecha_actual,
                'detalle_fecha_ejecucion'   => $fecha_ejecucion,
                'detalle_descripcion'       => $this->input->post('descripcion'),
                'detalle_estado_fk'         => $this->input->post('estado'),
                'detalle_observacion'       => $this->input->post('observacion')    
            );

            $insert = $this->detalle_ejecucion->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'detalles_ejecucion/agregar/'.$this->input->post('id_riesgo'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'detalles_ejecucion/index/'.$this->input->post('id_riesgo'));
        }
    }



    public function editar($id)
    {
        $data['detalle_ejecucion'] = $this->detalle_ejecucion->obtener_detalle_ejecucion($id);
        $data['estados'] = $this->detalle_ejecucion->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('detalles_ejecucion/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        
        $this->form_validation->set_rules('fecha_ejecucion', '', 'required');
        $this->form_validation->set_rules('descripcion', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('observacion', '', 'required');


        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {


            $fecha_ejecucion = date("Y-m-d", strtotime($this->input->post('fecha_ejecucion')));

            $data = array(

                'detalle_fecha_ejecucion'   => $fecha_ejecucion,
                'detalle_descripcion'       => $this->input->post('descripcion'),
                'detalle_estado_fk'         => $this->input->post('estado'),
                'detalle_observacion'       => $this->input->post('observacion')    
            );


            $update = $this->detalle_ejecucion->editar($data, $this->input->post('detalle_ejecucion_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'detalles_ejecucion/editar/'.$this->input->post('id_riesgo'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'detalles_ejecucion/index/'.$this->input->post('id_riesgo'));
        }
    }



    public function eliminar($id)
    {
        $delete = $this->detalle_ejecucion->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'secciones_calidad');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'secciones_calidad');
        }

    }


    public function exportar()
    {

        $usuarios = $this->detalle_ejecucion->consulta_exportar()->result();

        $cabeceras = $this->detalle_ejecucion->consulta_exportar()->list_fields();

        $nombre_archivo = 'Detalles_ejecucion_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $usuarios, $cabeceras);

    }



}
