<?php

class Detalles_Ejecucion_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_detalles_ejecucion($id)
    {
        $this->db->where('d.riesgo_oportunidad_fk', $id);
        $this->db->join('estado_ejecucion s', 's.estado_ejecucion_id = d.detalle_estado_fk');
        $query = $this->db->get('detalles_ejecucion d');
        return $query->result();
    }


    public function consulta_exportar()
    {
        return $query = $this->db->get('detalles_ejecucion');
    }


    public function obtener_detalle_ejecucion($id)
    {
        $this->db->join('estado_ejecucion s', 's.estado_ejecucion_id = d.detalle_estado_fk');
        $this->db->where('d.detalle_ejecucion_id', $id);
        $query = $this->db->get('detalles_ejecucion d');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('detalles_ejecucion', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('detalle_ejecucion_id', $id);
        return $this->db->delete('detalles_ejecucion');
    }


    public function editar($data, $id)
    {
        $this->db->where('detalle_ejecucion_id', $id);
        return $this->db->update('detalles_ejecucion', $data);
    }

    public function obtener_estados()
    {
        $query = $this->db->get('estado_ejecucion');
        return $query->result();
    }


    public function obtener_riesgo($id)
    {
        $this->db->where('seccion_id', $id);
        $query = $this->db->get('secciones_calidad');
        return $query->row();
    }

}