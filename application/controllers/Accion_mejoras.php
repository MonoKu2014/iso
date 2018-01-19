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
        $data['tipo_accion'] = $this->accion_mejora->obtener_tipos_acciones();
        $this->load->view('layout/header');
        $this->load->view('accion_mejoras/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

        $error = 0;

        $this->form_validation->set_rules('asunto', '', 'required');
        $this->form_validation->set_rules('incidencia', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('fecha_creacion', '', 'required');
        $this->form_validation->set_rules('accion', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');
        $this->form_validation->set_rules('resultado', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('fecha_inicio', '', 'required');
        $this->form_validation->set_rules('fecha_termino', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'acc_asunto'            => $this->input->post('asunto'),
                'acc_incidencia_fk'     => $this->input->post('incidencia'),
                'acc_seccion_fk'        => $this->input->post('seccion'),
                'acc_proceso_fk'        => $this->input->post('proceso'),
                'acc_fecha_creacion'    => $this->input->post('fecha_creacion'),
                'acc_accion_fk'         => $this->input->post('accion'),
                'acc_responsable_fk'    => $this->input->post('responsable'),
                'acc_resultado'         => $this->input->post('resultado'),
                'acc_estado_fk'         => $this->input->post('estado'),
                'acc_fecha_inicio'      => $this->input->post('fecha_inicio'),
                'acc_fecha_termino'     => $this->input->post('fecha_termino')
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
        $data['mejora'] = $this->accion_mejora->obtener_mejora($id);
        $data['incidencias'] = $this->accion_mejora->obtener_inicidencias();
        $data['responsables'] = $this->accion_mejora->obtener_responsables();
        $data['tipo_accion'] = $this->accion_mejora->obtener_tipos_acciones();
        $data['estados'] = $this->accion_mejora->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('accion_mejoras/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;

        $this->form_validation->set_rules('asunto', '', 'required');
        $this->form_validation->set_rules('incidencia', '', 'required');
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('fecha_creacion', '', 'required');
        $this->form_validation->set_rules('accion', '', 'required');
        $this->form_validation->set_rules('responsable', '', 'required');
        $this->form_validation->set_rules('resultado', '', 'required');
        $this->form_validation->set_rules('estado', '', 'required');
        $this->form_validation->set_rules('fecha_inicio', '', 'required');
        $this->form_validation->set_rules('fecha_termino', '', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'acc_asunto'            => $this->input->post('asunto'),
                'acc_incidencia_fk'     => $this->input->post('incidencia'),
                'acc_seccion_fk'        => $this->input->post('seccion'),
                'acc_proceso_fk'        => $this->input->post('proceso'),
                'acc_fecha_creacion'    => $this->input->post('fecha_creacion'),
                'acc_accion_fk'         => $this->input->post('accion'),
                'acc_responsable_fk'    => $this->input->post('responsable'),
                'acc_resultado'         => $this->input->post('resultado'),
                'acc_estado_fk'         => $this->input->post('estado'),
                'acc_fecha_inicio'      => $this->input->post('fecha_inicio'),
                'acc_fecha_termino'     => $this->input->post('fecha_termino')
            );

            $update = $this->accion_mejora->editar($data, $this->input->post('accion_id'));

            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'accion_mejoras/editar/'.$this->input->post('accion_id'));
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
