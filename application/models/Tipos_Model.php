<?php

class Tipos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_tipos()
    {
        $query = $this->db->get('tipo_dato');
        return $query->result();
    }


    public function obtener_tipo($id)
    {
        $this->db->where('tipo_dato_id', $id);
        $query = $this->db->get('tipo_dato');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('tipo_dato', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('tipo_dato_id', $id);
        return $this->db->delete('tipo_dato');
    }


    public function editar($data, $id)
    {
        $this->db->where('tipo_dato_id', $id);
        return $this->db->update('tipo_dato', $data);
    }

}