<?php

class Secciones_Calidad_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_secciones()
    {
        $this->db->join('usuarios u', 's.responsable_fk = u.usuario_id');
        $this->db->join('areas_calidad a', 'a.area_id = s.area_fk');
        $this->db->join('frecuencias f', 'f.frecuencia_id = s.frecuencia_fk');
        $query = $this->db->get('secciones_calidad s');
        return $query->result();
    }


    public function obtener_seccion($id)
    {
        $this->db->where('seccion_id', $id);
        $query = $this->db->get('secciones_calidad');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('secciones_calidad', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('seccion_id', $id);
        return $this->db->delete('secciones_calidad');
    }


    public function editar($data, $id)
    {
        $this->db->where('seccion_id', $id);
        return $this->db->update('secciones_calidad', $data);
    }

    public function obtener_areas()
    {
        $query = $this->db->get('areas_calidad');
        return $query->result();
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

    public function obtener_frecuencias()
    {
        $query = $this->db->get('frecuencias');
        return $query->result();
    }

}