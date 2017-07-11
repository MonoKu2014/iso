<?php

class Causas_incidencias_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_causas_incidencias()
    {
        $query = $this->db->get('causas_incidencias');
        return $query->result();
    }


    public function obtener_causa_incidencia($id)
    {
        $this->db->where('causa_incidencia_id', $id);
        $query = $this->db->get('causas_incidencias');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('causas_incidencias', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('causa_incidencia_id', $id);
        return $this->db->delete('causas_incidencias');
    }


    public function editar($data, $id)
    {
        $this->db->where('causa_incidencia_id', $id);
        return $this->db->update('causas_incidencias', $data);
    }

}