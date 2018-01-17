<?php

class Modificacion_documentos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_modificacion_documentos()
    {
        $query = $this->db->get('solicitud_documento');
        return $query->result();
    }


    public function obtener_documento($id)
    {
        $this->db->where('doc.solicitud_doc_id', $id);
        $this->db->join('secciones sec', 'sec.seccion_id = doc.seccion_fk');        
        $this->db->select('doc.*, sec.seccion_id, sec.seccion');
        $query = $this->db->get('solicitud_documento doc');

        //query_logger();

        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('solicitud_documento', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('solicitud_doc_id', $id);
        return $this->db->delete('solicitud_documento');
    }


    public function editar($data, $id)
    {
        $this->db->where('solicitud_doc_id', $id);
        return $this->db->update('solicitud_documento', $data);
    }

    public function areas()
    {
        $query = $this->db->get('areas');
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