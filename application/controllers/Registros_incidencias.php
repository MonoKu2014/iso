<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros_incidencias extends CI_Controller {


    const INICIADO = 1;


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('registros_incidencias_Model', 'registro_incidencia');
    }



    public function index()
    {
        $data['incidencias'] = $this->registro_incidencia->obtener_registros_incidencias();
        $this->load->view('layout/header');
        $this->load->view('registros_incidencias/index', $data);
        $this->load->view('layout/footer');
    }



    public function agregar()
    {
        $data['secciones'] = $this->registro_incidencia->secciones();
        $data['origenes'] = $this->registro_incidencia->origenes();
        $data['tipos'] = $this->registro_incidencia->tipos();
        $data['responsables'] = $this->registro_incidencia->responsables();
        $data['causas'] = $this->registro_incidencia->causas();
        $this->load->view('layout/header');
        $this->load->view('registros_incidencias/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {

        $error = 0;
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('origen', '', 'required');
        $this->form_validation->set_rules('tipo', '', 'required');
        $this->form_validation->set_rules('fecha', '', 'required');
        $this->form_validation->set_rules('deteccion', '', 'required');
        $this->form_validation->set_rules('asunto', '', 'required');
        $this->form_validation->set_rules('descripcion', '', 'required');
        $this->form_validation->set_rules('causa', '', 'required');
        $this->form_validation->set_rules('solucion', '', 'required');
        $this->form_validation->set_rules('solucion_texto', '', 'required');
        $this->form_validation->set_rules('inicio', '', 'required');
        $this->form_validation->set_rules('termino', '', 'required');

        $archivo = '';

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $archivo        = $_FILES['archivo'];
            $temporal       = $archivo['tmp_name'];
            $archivo_final  = $archivo['name'];

            if($archivo_final != ''){
                $directorio = 'assets/incidencias/';
                copy($temporal, $directorio.$archivo_final);
            }

            $data = array(
                'seccion_fk'                    => $this->input->post('seccion'),
                'proceso_fk'                    => $this->input->post('proceso'),
                'origen_fk'                     => $this->input->post('origen'),
                'tipo_fk'                       => $this->input->post('tipo'),
                'fecha_creacion_incidencia'     => $this->input->post('fecha'),
                'responsable_deteccion_fk'      => $this->input->post('deteccion'),
                'asunto_incidencia'             => $this->input->post('asunto'),
                'descripcion_incidencia'        => $this->input->post('descripcion'),
                'causa_fk'                      => $this->input->post('causa'),
                'responsable_solucion_fk'       => $this->input->post('solucion'),
                'solucion_incidencia'           => $this->input->post('solucion_texto'),
                'estado_incidencia_fk'          => self::INICIADO,
                'fecha_inicio_incidencia'       => $this->input->post('inicio'),
                'fecha_termino_incidencia'      => $this->input->post('termino'),
                'archivo_incidencia'            => $archivo_final
            );

            $insert = $this->registro_incidencia->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'registros_incidencias/agregar');
        } else {
            $texto = 'Se agrega un nuevo registro incidencia: ' . $this->input->post('descripcion');
            insertar_traza(fecha(), hora(), $this->session->id, 'registros_incidencias', 'Agregar', $texto, 0);
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'registros_incidencias');
        }

    }



    public function eliminar($id)
    {
        $delete = $this->registro_incidencia->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'registros_incidencias');
        } else {
            $texto = 'Se elimina registro incidencia con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'registros_incidencias', 'Eliminar', $texto, 1, $id);
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'registros_incidencias');
        }
    }


    public function editar($id)
    {
        $data['secciones'] = $this->registro_incidencia->secciones();
        $data['origenes'] = $this->registro_incidencia->origenes();
        $data['tipos'] = $this->registro_incidencia->tipos();
        $data['responsables'] = $this->registro_incidencia->responsables();
        $data['causas'] = $this->registro_incidencia->causas();
        $data['incidencia'] = $this->registro_incidencia->obtener_registro_incidencia($id);
        $this->load->view('layout/header');
        $this->load->view('registros_incidencias/editar', $data);
        $this->load->view('layout/footer');
    }



    public function guardar_edicion()
    {

        $error = 0;
        $this->form_validation->set_rules('seccion', '', 'required');
        $this->form_validation->set_rules('proceso', '', 'required');
        $this->form_validation->set_rules('origen', '', 'required');
        $this->form_validation->set_rules('tipo', '', 'required');
        $this->form_validation->set_rules('fecha', '', 'required');
        $this->form_validation->set_rules('deteccion', '', 'required');
        $this->form_validation->set_rules('asunto', '', 'required');
        $this->form_validation->set_rules('descripcion', '', 'required');
        $this->form_validation->set_rules('causa', '', 'required');
        $this->form_validation->set_rules('solucion', '', 'required');
        $this->form_validation->set_rules('solucion_texto', '', 'required');
        $this->form_validation->set_rules('inicio', '', 'required');
        $this->form_validation->set_rules('termino', '', 'required');

        $archivo = '';

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $archivo        = $_FILES['archivo'];
            $temporal       = $archivo['tmp_name'];
            $archivo_final  = $archivo['name'];

            if($archivo_final != ''){
                $directorio = 'assets/incidencias/';
                copy($temporal, $directorio.$archivo_final);
            } else {
                $archivo_final = $this->input->post('archivo_actual');
            }

            $data = array(
                'seccion_fk'                    => $this->input->post('seccion'),
                'proceso_fk'                    => $this->input->post('proceso'),
                'origen_fk'                     => $this->input->post('origen'),
                'tipo_fk'                       => $this->input->post('tipo'),
                'fecha_creacion_incidencia'     => $this->input->post('fecha'),
                'responsable_deteccion_fk'      => $this->input->post('deteccion'),
                'asunto_incidencia'             => $this->input->post('asunto'),
                'descripcion_incidencia'        => $this->input->post('descripcion'),
                'causa_fk'                      => $this->input->post('causa'),
                'responsable_solucion_fk'       => $this->input->post('solucion'),
                'solucion_incidencia'           => $this->input->post('solucion_texto'),
                'estado_incidencia_fk'          => self::INICIADO,
                'fecha_inicio_incidencia'       => $this->input->post('inicio'),
                'fecha_termino_incidencia'      => $this->input->post('termino'),
                'archivo_incidencia'            => $archivo_final
            );

            $insert = $this->registro_incidencia->editar($data, $this->input->post('incidencia_id'));
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'registros_incidencias/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'registros_incidencias');
        }

    }


}
