<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores_procesos extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('indicadores_procesos_Model', 'indicador_proceso');
    }


	public function index()
	{
        $data['indicadores_procesos'] = $this->indicador_proceso->obtener_indicadores_procesos();
        $this->load->view('layout/header');
		$this->load->view('indicadores_procesos/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['areas'] = $this->indicador_proceso->areas();
        $this->load->view('layout/header');
        $this->load->view('indicadores_procesos/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

        $error = 0;

        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('indicador', '', 'required');
        $this->form_validation->set_rules('dato_superior', '', 'required');
        $this->form_validation->set_rules('dato_inferior', '', 'required');
        $this->form_validation->set_rules('total_indidicador', '', 'required');
        $this->form_validation->set_rules('fecha', '', '');
        $this->form_validation->set_rules('observaciones', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area_fk'                       => $this->input->post('area'),
                'seccion_fk'                    => $this->input->post('seccion'),
                'proceso_fk'                    => $this->input->post('proceso'),
                'indicador_fk'                  => $this->input->post('indicador'),
                'valor_dato_superior'           => $this->input->post('dato_superior'),
                'valor_dato_inferior'           => $this->input->post('dato_inferior'),
                'indicador_proceso_indicador'   => $this->input->post('total_indidicador'),
                'indicador_proceso_fecha'       => $this->input->post('fecha'),
                'indicador_proceso_observacion' => $this->input->post('observaciones')
            );

            $insert = $this->indicador_proceso->insertar($data);

            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'indicadores_procesos/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'indicadores_procesos');
        }
    }



    public function editar($id)
    {
        $data['indicador_proceso'] = $this->indicador_proceso->obtener_indicador_proceso($id);
        $data['areas'] = $this->indicador_proceso->areas();
        $this->load->view('layout/header');
        $this->load->view('indicadores_procesos/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;

            $this->form_validation->set_rules('area', '', 'required');
            $this->form_validation->set_rules('seccion', '', 'required');
            $this->form_validation->set_rules('proceso', '', 'required');
            $this->form_validation->set_rules('indicador', '', 'required');
            $this->form_validation->set_rules('dato_superior', '', 'required');
            $this->form_validation->set_rules('dato_inferior', '', 'required');
            $this->form_validation->set_rules('total_indidicador', '', 'required');
            $this->form_validation->set_rules('fecha', '', '');
            $this->form_validation->set_rules('observaciones', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'area_fk'                       => $this->input->post('area'),
                'seccion_fk'                    => $this->input->post('seccion'),
                'proceso_fk'                    => $this->input->post('proceso'),
                'indicador_fk'                  => $this->input->post('indicador'),
                'valor_dato_superior'           => $this->input->post('dato_superior'),
                'valor_dato_inferior'           => $this->input->post('dato_inferior'),
                'indicador_proceso_indicador'   => $this->input->post('total_indidicador'),
                'indicador_proceso_fecha'       => $this->input->post('fecha'),
                'indicador_proceso_observacion' => $this->input->post('observaciones')
            );

            $update = $this->indicador_proceso->editar($data, $this->input->post('indicador_proceso_id'));

            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'indicadores_procesos/editar/'.$this->input->post('indicador_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'indicadores_procesos');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->indicador_proceso->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'indicadores_procesos');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'indicadores_procesos');
        }

    }


    public function exportar()
    {

        $datos = $this->indicador_proceso->consulta_exportar()->result();

        $cabeceras = $this->indicador_proceso->consulta_exportar()->list_fields();

        $nombre_archivo = 'Indicadores_procesos_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
