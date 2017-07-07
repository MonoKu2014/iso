<?php

class Frecuencias_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_frecuencias()
    {
        $query = $this->db->get('frecuencias');
        return $query->result();
    }


    public function obtener_frecuencia($id)
    {
        $this->db->where('frecuencia_id', $id);
        $query = $this->db->get('frecuencias');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('frecuencias', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('frecuencia_id', $id);
        return $this->db->delete('frecuencias');
    }


    public function editar($data, $id)
    {
        $this->db->where('frecuencia_id', $id);
        return $this->db->update('frecuencias', $data);
    }

}