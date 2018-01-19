<?php

class Indicadores_Calidad_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function obtener_indicadores()
    {
        $query = $this->db->get('indicadores_calidad');
        return $query->result();
    }
    public function obtener_indicador($id)
    {
        $this->db->where('i.indicador_id', $id);
        $this->db->join('secciones_calidad s', 's.seccion_id = i.seccion_fk');
        $this->db->join('objetivos p', 'p.objetivo_id = i.objetivo_fk');
        $this->db->join('datos d', 'd.dato_id = i.dato_superior_fk');
        $this->db->join('datos d', 'd.dato_id = i.dato_superior_fk');
        $query = $this->db->get('indicadores_calidad i');
        return $query->row();
    }
    public function insertar($data)
    {
        return $this->db->insert('indicadores_calidad', $data);
    }
    public function eliminar($id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->delete('indicadores_calidad');
    }
    public function editar($data, $id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->update('indicadores_calidad', $data);
    }
    public function areas()
    {
        return $this->db->get('areas_calidad')->result();
    }
}