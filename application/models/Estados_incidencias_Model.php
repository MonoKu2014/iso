<?php

class Estados_incidencias_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_estados_incidencias()
    {
        $query = $this->db->get('estados_incidencias');
        return $query->result();
    }


    public function obtener_estado_incidencia($id)
    {
        $this->db->where('estado_incidencia_id', $id);
        $query = $this->db->get('estados_incidencias');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('estados_incidencias', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('estado_incidencia_id', $id);
        return $this->db->delete('estados_incidencias');
    }


    public function editar($data, $id)
    {
        $this->db->where('estado_incidencia_id', $id);
        return $this->db->update('estados_incidencias', $data);
    }

}