<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        //valida si el usuario que esta ingresando, tiene permisos de lectura a este módulo
        can_read(1);
        $this->load->model('usuarios_Model', 'usuario');
    }


	public function index()
	{
        $data['usuarios'] = $this->usuario->obtener_usuarios();
        $this->load->view('layout/header');
		$this->load->view('usuarios/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['perfiles'] = $this->usuario->obtener_perfiles();
        $data['estados'] = $this->usuario->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('usuarios/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('perfil', 'Perfil', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'usuario_nombre'    => $this->input->post('nombre'),
                'usuario_email'     => $this->input->post('email'),
                'usuario_password'  => $this->input->post('password'),
                'perfil_fk'         => $this->input->post('perfil'),
                'estado_fk'         => $this->input->post('estado')
            );

            $insert = $this->usuario->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'usuarios/agregar');
        } else {

            $texto = 'Se agrega un nuevo usuario: ' . $this->input->post('nombre');
            insertar_traza(fecha(), hora(), $this->session->id, 'usuarios', 'Agregar', $texto, 0);

            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'usuarios');
        }
    }


    public function editar($id)
    {
        $data['usuario'] = $this->usuario->obtener_usuario($id);
        $data['perfiles'] = $this->usuario->obtener_perfiles();
        $data['estados'] = $this->usuario->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('usuarios/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('perfil', 'Perfil', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'usuario_nombre'    => $this->input->post('nombre'),
                'usuario_email'     => $this->input->post('email'),
                'usuario_password'  => $this->input->post('password'),
                'perfil_fk'         => $this->input->post('perfil'),
                'estado_fk'         => $this->input->post('estado')
            );

            $insert = $this->usuario->editar($data, $this->input->post('usuario_id'));
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido editar el registro'));
            redirect(base_url().'usuarios/editar/' . $this->input->post('usuario_id'));
        } else {

            $id_edit = $this->input->post('usuario_id');
            $texto = 'Se edita usuario: ' . $this->input->post('nombre');
            $id_traza = insertar_traza(fecha(), hora(), $this->session->id, 'usuarios', 'Editar', $texto, 0, 0, $id_edit);

            $registro = $this->usuario->obtener_usuario($id_edit);

            $old_data = array(
                'usuario_nombre'    => $registro->usuario_nombre,
                'usuario_email'     => $registro->usuario_email,
                'usuario_password'  => $registro->usuario_password,
                'perfil_fk'         => $registro->perfil_fk,
                'estado_fk'         => $registro->estado_fk
            );

            insertar_traza_edicion($id_traza, $data, $old_data);

            $this->session->set_flashdata('message', alert_success('Registro editado con éxito'));
            redirect(base_url().'usuarios');
        }
    }


    public function eliminar($id)
    {
        $delete = $this->usuario->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'usuarios');
        } else {

            $texto = 'Se elimina usuario con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'usuarios', 'Eliminar', $texto, 1, $id);

            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'usuarios');
        }

    }


    public function activar($id)
    {
        $data = array('estado_fk' => 1);
        $update = $this->usuario->editar($data, $id);
        if($update === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido activar el registro'));
            redirect(base_url().'usuarios');
        } else {
            $texto = 'Se activa usuario con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'usuarios', 'Activar', $texto, 0, 0, $id);
            $this->session->set_flashdata('message', alert_success('Registro activado con éxito'));
            redirect(base_url().'usuarios');
        }

    }


    public function desactivar($id)
    {
        $data = array('estado_fk' => 2);
        $update = $this->usuario->editar($data, $id);
        if($update === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido desactivar el registro'));
            redirect(base_url().'usuarios');
        } else {
            $texto = 'Se desactiva usuario con ID: ' . $id;
            insertar_traza(fecha(), hora(), $this->session->id, 'usuarios', 'Desactivar', $texto, 0, 0, $id);
            $this->session->set_flashdata('message', alert_success('Registro desactivado con éxito'));
            redirect(base_url().'usuarios');
        }

    }


    public function exportar()
    {

        $usuarios = $this->usuario->consulta_exportar()->result();

        $cabeceras = $this->usuario->consulta_exportar()->list_fields();

        $nombre_archivo = 'Usuarios_'.date('d-m-Y').'.xlsx';

        main_export($nombre_archivo, $usuarios, $cabeceras);

    }

}
