<?php

class Objetivos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_objetivos()
    {
        $query = $this->db->get('objetivos');
        return $query->result();
    }


    public function obtener_objetivo($id)
    {
        $this->db->where('p.objetivo_id', $id);
        $this->db->join('secciones_calidad s', 's.seccion_id = p.seccion_fk');
        $query = $this->db->get('objetivos p');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('objetivos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('objetivo_id', $id);
        return $this->db->delete('objetivos');
    }


    public function editar($data, $id)
    {
        $this->db->where('objetivo_id', $id);
        return $this->db->update('objetivos', $data);
    }

    public function areas()
    {
        return $this->db->get('areas_calidad')->result();
    }

    public function obtener_estados()
    {
        $query = $this->db->get('estados');
        return $query->result();
    }


    public function obtener_responsables()
    {
        $query = $this->db->get('responsables');
        return $query->result();
    }


}