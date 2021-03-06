<?php

class Calidad_mejoras_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_calidad_mejoras()
    {
        $query = $this->db->get('calidad_mejoras');
        return $query->result();
    }


    public function obtener_mejora($id)
    {
        $this->db->where('acc.accion_id', $id);
        $this->db->join('secciones sec', 'sec.seccion_id = acc.acc_seccion_fk');
        $this->db->join('procesos pro', 'pro.proceso_id = acc.acc_proceso_fk');        
        //$this->db->select('acc.*, sec.seccion_id, sec.seccion');
        $query = $this->db->get('calidad_mejoras acc');

        //query_logger();

        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('calidad_mejoras', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('accion_id', $id);
        return $this->db->delete('calidad_mejoras');
    }


    public function editar($data, $id)
    {
        $this->db->where('accion_id', $id);
        return $this->db->update('calidad_mejoras', $data);
    }

    public function obtener_inicidencias()
    {
        $query = $this->db->get('incidencias');
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

    public function obtener_tipos_acciones()
    {
        $query = $this->db->get('acciones');
        return $query->result();
    }

}