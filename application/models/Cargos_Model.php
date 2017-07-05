<?php

class Cargos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_cargos()
    {
        $query = $this->db->get('cargos');
        return $query->result();
    }


    public function obtener_cargo($id)
    {
        $this->db->where('cargo_id', $id);
        $query = $this->db->get('cargos');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('cargos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('cargo_id', $id);
        return $this->db->delete('cargos');
    }


    public function editar($data, $id)
    {
        $this->db->where('cargo_id', $id);
        return $this->db->update('cargos', $data);
    }

}