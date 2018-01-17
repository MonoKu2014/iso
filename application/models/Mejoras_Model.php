<?php

class Mejoras_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_mejoras()
    {
        $query = $this->db->get('mejoras');
        return $query->result();
    }


    public function consulta_exportar()
    {
        return $query = $this->db->get('mejoras');
    }


    public function obtener_mejora($id)
    {
        $this->db->where('mejora_id', $id);
        $query = $this->db->get('mejoras');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('mejoras', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('mejora_id', $id);
        return $this->db->delete('mejoras');
    }


    public function editar($data, $id)
    {
        $this->db->where('mejora_id', $id);
        return $this->db->update('mejoras', $data);
    }

}