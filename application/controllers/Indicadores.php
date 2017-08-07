<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('indicadores_Model', 'indicador');
    }


	public function index()
	{
        $data['indicadores'] = $this->indicador->obtener_indicadores();
        $this->load->view('layout/header');
		$this->load->view('indicadores/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {   
        $data['areas'] = $this->indicador->areas();
        $this->load->view('layout/header');
        $this->load->view('indicadores/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        //var_dump($this->input->post());
        //var_dump($this->input->post());
        //exit();

        $error = 0;
        $this->form_validation->set_rules('indicador', '', 'required');
        $this->form_validation->set_rules('nombre', '', 'required');
        $this->form_validation->set_rules('area', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('objetivo', '', 'required');
        $this->form_validation->set_rules('superior', '', 'required');
        $this->form_validation->set_rules('inferior', '', 'required');
        $this->form_validation->set_rules('evaluacion_positiva', '', 'required');
        $this->form_validation->set_rules('real', '', 'required');
        $this->form_validation->set_rules('minimo', '', 'required');
        $this->form_validation->set_rules('maximo', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {
            /* Valor Mínimo*/
            if($this->input->post('evaluacion_positiva') == 1){

                $data = array(
                    'indicador_codigo'              => $this->input->post('indicador'),
                    'indicador_nombre'              => $this->input->post('nombre'),
                    'area_fk'                       => $this->input->post('area'),
                    'seccion_fk'                    => $this->input->post('seccion'),
                    'proceso_fk'                    => $this->input->post('proceso'),
                    'indicador_objetivo'            => $this->input->post('objetivo'),
                    'dato_superior_fk'              => $this->input->post('superior'),
                    'dato_inferior_fk'              => $this->input->post('inferior'),
                    'evaluacion_positiva_minima'    => 1,
                    'evaluacion_positiva_maxima'    => 0,
                    'indicador_real'                => $this->input->post('real'),
                    'indicador_minimo'              => $this->input->post('minimo'),
                    'indicador_maximo'              => $this->input->post('maximo')
                );

            } else {

                $data = array(
                    'indicador_codigo'              => $this->input->post('indicador'),
                    'indicador_nombre'              => $this->input->post('nombre'),
                    'area_fk'                       => $this->input->post('area'),
                    'seccion_fk'                    => $this->input->post('seccion'),
                    'proceso_fk'                    => $this->input->post('proceso'),
                    'indicador_objetivo'            => $this->input->post('objetivo'),
                    'dato_superior_fk'              => $this->input->post('superior'),
                    'dato_inferior_fk'              => $this->input->post('inferior'),
                    'evaluacion_positiva_minima'    => 0,
                    'evaluacion_positiva_maxima'    => 1,
                    'indicador_real'                => $this->input->post('real'),
                    'indicador_minimo'              => $this->input->post('minimo'),
                    'indicador_maximo'              => $this->input->post('maximo')
                );
            }            
            

            $insert = $this->indicador->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'indicadores/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'indicadores');
        }
    }



    public function editar($id)
    {
        $data['indicador'] = $this->indicador->obtener_indicador($id);
        $data['areas'] = $this->indicador->areas();
        $this->load->view('layout/header');
        $this->load->view('indicadores/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        
            $this->form_validation->set_rules('indicador', '', 'required');
            $this->form_validation->set_rules('nombre', '', 'required');
            $this->form_validation->set_rules('area', '', 'required');
            $this->form_validation->set_rules('seccion', '', 'required');
            $this->form_validation->set_rules('proceso', '', 'required');
            $this->form_validation->set_rules('objetivo', '', 'required');
            $this->form_validation->set_rules('superior', '', 'required');
            $this->form_validation->set_rules('inferior', '', 'required');
            $this->form_validation->set_rules('evaluacion_positiva', '', 'required');
            $this->form_validation->set_rules('real', '', 'required');
            $this->form_validation->set_rules('minimo', '', 'required');
            $this->form_validation->set_rules('maximo', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            /* Valor Mínimo*/
            if($this->input->post('evaluacion_positiva') == 1){

                $data = array(
                    'indicador_codigo'              => $this->input->post('indicador'),
                    'indicador_nombre'              => $this->input->post('nombre'),
                    'area_fk'                       => $this->input->post('area'),
                    'seccion_fk'                    => $this->input->post('seccion'),
                    'proceso_fk'                    => $this->input->post('proceso'),
                    'indicador_objetivo'            => $this->input->post('objetivo'),
                    'dato_superior_fk'              => $this->input->post('superior'),
                    'dato_inferior_fk'              => $this->input->post('inferior'),
                    'evaluacion_positiva_minima'    => 1,
                    'evaluacion_positiva_maxima'    => 0,
                    'indicador_real'                => $this->input->post('real'),
                    'indicador_minimo'              => $this->input->post('minimo'),
                    'indicador_maximo'              => $this->input->post('maximo')
                );

            } else {

                $data = array(
                    'indicador_codigo'              => $this->input->post('indicador'),
                    'indicador_nombre'              => $this->input->post('nombre'),
                    'area_fk'                       => $this->input->post('area'),
                    'seccion_fk'                    => $this->input->post('seccion'),
                    'proceso_fk'                    => $this->input->post('proceso'),
                    'indicador_objetivo'            => $this->input->post('objetivo'),
                    'dato_superior_fk'              => $this->input->post('superior'),
                    'dato_inferior_fk'              => $this->input->post('inferior'),
                    'evaluacion_positiva_minima'    => 0,
                    'evaluacion_positiva_maxima'    => 1,
                    'indicador_real'                => $this->input->post('real'),
                    'indicador_minimo'              => $this->input->post('minimo'),
                    'indicador_maximo'              => $this->input->post('maximo')
                );
            } 

            $update = $this->indicador->editar($data, $this->input->post('indicador_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'indicadores/editar/'.$this->input->post('indicador_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'indicadores');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->indicador->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'indicadores');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'indicadores');
        }

    }


    public function exportar()
    {

        $datos = $this->indicador->consulta_exportar()->result();

        $cabeceras = $this->indicador->consulta_exportar()->list_fields();

        $nombre_archivo = 'Indicadores_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $datos, $cabeceras);

    }



}
