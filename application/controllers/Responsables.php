<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsables extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('responsables_Model', 'responsable');
    }


	public function index()
	{
        $data['responsables'] = $this->responsable->obtener_responsables();
        $this->load->view('layout/header');
		$this->load->view('responsables/index', $data);
        $this->load->view('layout/footer');
	}


    public function agregar()
    {
        $data['departamentos'] = $this->responsable->obtener_departamentos();
        $data['cargos'] = $this->responsable->obtener_cargos();
        $data['estados'] = $this->responsable->obtener_estados();
        $this->load->view('layout/header');
        $this->load->view('responsables/agregar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;

        $this->form_validation->set_rules('funcionario', 'Funcionario', 'required');
        $this->form_validation->set_rules('departamento', 'Responsable', 'required');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('telefono_comercial', 'Telefono_comercial', 'required');
        $this->form_validation->set_rules('telefono_particular', 'Telefono_particular', 'required');
        $this->form_validation->set_rules('telefono_celular', 'Telefono_celular', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {


            $curriculum = $_FILES['curriculum'];
            $temporal   = $curriculum['tmp_name'];
            $cv     = $curriculum['name'];

            if($cv != ''){
                $directorio = 'assets/curriculums/';
                copy($temporal, $directorio.$cv);
            }


            $curriculum = $_FILES['foto'];
            $temporal   = $curriculum['tmp_name'];
            $foto     = $curriculum['name'];

            if($foto != ''){
                $directorio = 'assets/fotos/';
                copy($temporal, $directorio.$foto);
            }


            $data = array(
                'responsable_funcionario'       => $this->input->post('funcionario'),
                'departamento_fk'               => $this->input->post('departamento'),
                'cargo_fk'                      => $this->input->post('cargo'),
                'responsable'                   => $this->input->post('nombre'),
                'responsable_titulo'            => $this->input->post('titulo'),
                'responsable_curriculum'        => $cv,
                'responsable_fono_comercial '   => $this->input->post('telefono_comercial'),
                'responsable_fono_particular'   => $this->input->post('telefono_particular'),
                'responsable_fono_celular'      => $this->input->post('telefono_celular'),
                'responsable_email'             => $this->input->post('email'),
                'estado_fk'                     => $this->input->post('estado'),
                'responsable_foto'              => $foto
            );

            $insert = $this->responsable->insertar($data);
            if($insert === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido crear el registro'));
            redirect(base_url().'responsables/agregar');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro creado con éxito'));
            redirect(base_url().'responsables');
        }
    }



    public function editar($id)
    {
        $data['responsable'] = $this->responsable->obtener_responsable($id);
        $data['departamentos'] = $this->responsable->obtener_departamentos();
        $data['cargos'] = $this->responsable->obtener_cargos();
        $data['estados'] = $this->responsable->obtener_estados();

        $this->load->view('layout/header');
        $this->load->view('responsables/editar', $data);
        $this->load->view('layout/footer');
    }


    public function guardar_edicion()
    {
        $error = 0;

        $this->form_validation->set_rules('funcionario', 'Funcionario', 'required');
        $this->form_validation->set_rules('departamento', 'Responsable', 'required');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('curriculum', 'Curriculum');
        $this->form_validation->set_rules('telefono_comercial', 'Telefono_comercial', 'required');
        $this->form_validation->set_rules('telefono_particular', 'Telefono_particular', 'required');
        $this->form_validation->set_rules('telefono_celular', 'Telefono_celular', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('foto', 'Foto');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            $data = array(
                'responsable_funcionario'       => $this->input->post('funcionario'),
                'departamento_fk'               => $this->input->post('departamento'),
                'cargo_fk'                      => $this->input->post('cargo'),
                'responsable'                   => $this->input->post('nombre'),
                'responsable_titulo'            => $this->input->post('titulo'),
                'responsable_curriculum'        => $this->input->post('curriculum'),
                'responsable_fono_comercial '   => $this->input->post('telefono_comercial'),
                'responsable_fono_particular'   => $this->input->post('telefono_particular'),
                'responsable_fono_celular'      => $this->input->post('telefono_celular'),
                'responsable_email'             => $this->input->post('email'),
                'estado_fk'                     => $this->input->post('estado'),
                'responsable_foto'              => $this->input->post('foto')
            );

            $update = $this->responsable->editar($data, $this->input->post('responsable_id'));
            if($update === false){
                $error = 1;
            }
        }

        if($error == 1){
            $this->session->set_flashdata('message', alert_danger('No se ha podido actualizar el registro'));
            redirect(base_url().'responsables/editar/'.$this->input->post('responsable_id'));
        } else {
            $this->session->set_flashdata('message', alert_success('Registro actualizado con éxito'));
            redirect(base_url().'responsables');
        }
    }



    public function eliminar($id)
    {
        $delete = $this->responsable->eliminar($id);
        if($delete === false){
            $this->session->set_flashdata('message', alert_danger('No se ha podido eliminar el registro'));
            redirect(base_url().'responsables');
        } else {
            $this->session->set_flashdata('message', alert_success('Registro eliminado con éxito'));
            redirect(base_url().'responsables');
        }

    }


}
