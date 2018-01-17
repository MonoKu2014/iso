<?php

class Accion_mejoras_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_accion_mejoras()
    {
        $query = $this->db->get('accion_mejora');
        return $query->result();
    }


    public function obtener_mejora($id)
    {
        $this->db->where('doc.solicitud_doc_id', $id);
        $this->db->join('secciones sec', 'sec.seccion_id = doc.seccion_fk');        
        $this->db->select('doc.*, sec.seccion_id, sec.seccion');
        $query = $this->db->get('accion_mejora doc');

        //query_logger();

        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('accion_mejora', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('solicitud_doc_id', $id);
        return $this->db->delete('accion_mejora');
    }


    public function editar($data, $id)
    {
        $this->db->where('solicitud_doc_id', $id);
        return $this->db->update('accion_mejora', $data);
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

    public function obtener_documentos()
    {
        $query = $this->db->get('documentos');
        return $query->result();
    }

}