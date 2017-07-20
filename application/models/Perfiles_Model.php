<?php

class Perfiles_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_perfiles()
    {
        $query = $this->db->get('perfiles');
        return $query->result();
    }

}