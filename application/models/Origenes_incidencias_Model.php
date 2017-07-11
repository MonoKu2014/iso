<?php

class Origenes_incidencias_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_origenes_incidencias()
    {
        $query = $this->db->get('origenes_incidencias');
        return $query->result();
    }


    public function obtener_origen_incidencia($id)
    {
        $this->db->where('origen_incidencia_id', $id);
        $query = $this->db->get('origenes_incidencias');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('origenes_incidencias', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('origen_incidencia_id', $id);
        return $this->db->delete('origenes_incidencias');
    }


    public function editar($data, $id)
    {
        $this->db->where('origen_incidencia_id', $id);
        return $this->db->update('origenes_incidencias', $data);
    }

}