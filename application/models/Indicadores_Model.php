<?php

class Indicadores_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function obtener_indicadores()
    {
        $query = $this->db->get('indicadores');
        return $query->result();
    }
    public function obtener_indicador($id)
    {
        $this->db->where('i.indicador_id', $id);
        $this->db->join('secciones s', 's.seccion_id = i.seccion_fk');
        $this->db->join('procesos p', 'p.proceso_id = i.proceso_fk');
        $this->db->join('datos d', 'd.dato_id = i.dato_superior_fk');
        $this->db->join('datos dos', 'dos.dato_id = i.dato_superior_fk');
        $query = $this->db->get('indicadores i');
        return $query->row();
    }
    public function insertar($data)
    {
        return $this->db->insert('indicadores', $data);
    }
    public function eliminar($id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->delete('indicadores');
    }
    public function editar($data, $id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->update('indicadores', $data);
    }
    public function areas()
    {
        return $this->db->get('areas')->result();
    }
}