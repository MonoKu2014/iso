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


    public function obtener_modulos_administracion($id)
    {
    	$array = array(1, 2);

    	$this->db->where('p.perfil_fk', $id);
    	$this->db->where_in('m.modulo_id', $array);
    	$this->db->join('permisos p', 'p.modulo_fk = m.modulo_id');
        $query = $this->db->get('modulos m');
        return $query->result();
    }


    public function obtener_modulos_parametros($id)
    {
    	$array = array(3, 4, 5, 6, 7, 8);

    	$this->db->where('p.perfil_fk', $id);
    	$this->db->where_in('m.modulo_id', $array);
    	$this->db->join('permisos p', 'p.modulo_fk = m.modulo_id');
        $query = $this->db->get('modulos m');
        return $query->result();
    }



    public function obtener_perfil($id)
    {
    	$this->db->where('perfil_id', $id);
        $query = $this->db->get('perfiles');
        return $query->row();
    }


}