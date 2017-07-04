<?php

class Secciones_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_secciones()
    {
        $this->db->join('usuarios u', 's.responsable_fk = u.usuario_id');
        $this->db->join('areas a', 'a.area_id = s.area_fk');
        $this->db->join('frecuencias f', 'f.frecuencia_id = s.frecuencia_fk');
        $query = $this->db->get('secciones s');
        return $query->result();
    }


    public function obtener_seccion($id)
    {
        $this->db->where('seccion_id', $id);
        $query = $this->db->get('secciones');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('secciones', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('seccion_id', $id);
        return $this->db->delete('secciones');
    }


    public function editar($data, $id)
    {
        $this->db->where('seccion_id', $id);
        return $this->db->update('secciones', $data);
    }

}