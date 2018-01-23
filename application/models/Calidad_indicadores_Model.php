<?php

class Calidad_indicadores_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_calidad_indicadores()
    {
        $this->db->join('secciones s', 's.seccion_id = i.seccion_fk');
        $this->db->join('procesos p', 'p.proceso_id = i.proceso_fk');
        $this->db->join('areas a', 'a.area_id = i.area_fk');
        $query = $this->db->get('calidad_indicadores i');
        return $query->result();
    }


    public function obtener_registro_indicador($id)
    {
        $this->db->where('i.indicador_id', $id);
        $this->db->join('secciones s', 's.seccion_id = i.seccion_fk');
        $this->db->join('procesos p', 'p.proceso_id = i.proceso_fk');
        $this->db->join('areas a', 'a.area_id = i.area_fk');
        $this->db->join('indicadores in', 'in.indicador_id = i.indicador_codigo');
        $query = $this->db->get('calidad_indicadores i');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('calidad_indicadores', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->delete('calidad_indicadores');
    }


    public function editar($data, $id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->update('calidad_indicadores', $data);
    }

    public function areas()
    {
        return $this->db->get('areas')->result();
    }

}