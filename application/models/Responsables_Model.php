<?php

class Responsables_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_responsables()
    {
        $query = $this->db->get('responsables');
        return $query->result();
    }


    public function obtener_responsable($id)
    {
        $this->db->where('responsable_id', $id);
        $query = $this->db->get('responsables');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('responsables', $data);
    }

    public function obtener_departamentos()
    {
        $query = $this->db->get('departamentos');
        return $query->result();
    }

    public function obtener_cargos()
    {
        $query = $this->db->get('cargos');
        return $query->result();
    }

    public function obtener_estados()
    {
        $query = $this->db->get('estados');
        return $query->result();
    }

    public function eliminar($id)
    {
        $this->db->where('responsable_id', $id);
        return $this->db->delete('responsables');
    }


    public function editar($data, $id)
    {
        $this->db->where('responsable_id', $id);
        return $this->db->update('responsables', $data);
    }

}