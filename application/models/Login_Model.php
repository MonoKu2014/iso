<?php

class Login_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    //tratemos de tener todas las funciones en inglés y con skake case que es separado por guiones bajos
    public function get_login($email, $password)
    {
        $this->db->where('usuario_password', $password);
        $this->db->where('usuario_email', $email);
        $query = $this->db->get('usuarios');
        return $query->row();
    }


}