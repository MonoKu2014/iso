<?php

class Trazabilidad_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_trazas($id)
    {
        $this->db->where('traza_usuario', $id);
        $query = $this->db->get('trazabilidad');
        return $query->result();
    }

    public function obtener_traza_por_id($id)
    {
        $this->db->where('traza_id', $id);
        $query = $this->db->get('trazabilidad');
        return $query->row();
    }


}