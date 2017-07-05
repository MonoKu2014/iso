<?php

class Departamentos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_departamentos()
    {
        $query = $this->db->get('departamentos');
        return $query->result();
    }


    public function obtener_departamento($id)
    {
        $this->db->where('departamento_id', $id);
        $query = $this->db->get('departamentos');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('departamentos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('departamento_id', $id);
        return $this->db->delete('departamentos');
    }


    public function editar($data, $id)
    {
        $this->db->where('departamento_id', $id);
        return $this->db->update('departamentos', $data);
    }

}