<?php

class Areas_Calidad_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_areas()
    {
        $query = $this->db->get('areas_calidad');
        return $query->result();
    }


    public function consulta_exportar()
    {
        return $query = $this->db->get('areas_calidad');
    }


    public function obtener_area($id)
    {
        $this->db->where('area_id', $id);
        $query = $this->db->get('areas_calidad');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('areas_calidad', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('area_id', $id);
        return $this->db->delete('areas_calidad');
    }


    public function tiene_procesos($id)
    {
        $this->db->where('area_fk', $id);
        return $this->db->count_all_results('procesos_calidad');
    }


    public function editar($data, $id)
    {
        $this->db->where('area_id', $id);
        return $this->db->update('areas_calidad', $data);
    }

}