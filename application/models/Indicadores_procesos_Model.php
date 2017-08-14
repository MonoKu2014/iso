<?php

class Indicadores_procesos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_indicadores_procesos()
    {
        $query = $this->db->get('indicadores_procesos');
        return $query->result();
    }


    public function obtener_indicador_proceso($id)
    {
        $this->db->where('i.indicador_proceso_id', $id);
        $this->db->join('secciones s', 's.seccion_id = i.seccion_fk');
        $this->db->join('procesos p', 'p.proceso_id = i.proceso_fk');
        $this->db->join('indicadores ind', 'ind.indicador_id = i.indicador_fk');        
        $query = $this->db->get('indicadores_procesos i');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('indicadores_procesos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('indicador_proceso_id', $id);
        return $this->db->delete('indicadores_procesos');
    }


    public function editar($data, $id)
    {
        $this->db->where('indicador_proceso_id', $id);
        return $this->db->update('indicadores_procesos', $data);
    }

    public function areas()
    {
        return $this->db->get('areas')->result();
    }

}