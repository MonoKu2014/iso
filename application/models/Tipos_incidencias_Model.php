<?php

class Tipos_incidencias_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_tipos_incidencias()
    {
        $query = $this->db->get('tipos_incidencias');
        return $query->result();
    }


    public function obtener_tipo_incidencia($id)
    {
        $this->db->where('tipo_incidencia_id', $id);
        $query = $this->db->get('tipos_incidencias');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('tipos_incidencias', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('tipo_incidencia_id', $id);
        return $this->db->delete('tipos_incidencias');
    }


    public function editar($data, $id)
    {
        $this->db->where('tipo_incidencia_id', $id);
        return $this->db->update('tipos_incidencias', $data);
    }

}