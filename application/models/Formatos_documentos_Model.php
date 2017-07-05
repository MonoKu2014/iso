<?php

class Formatos_documentos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_formatos_documentos()
    {
        $query = $this->db->get('formatos_documentos');
        return $query->result();
    }


    public function obtener_formato_documento($id)
    {
        $this->db->where('formato_documento_id', $id);
        $query = $this->db->get('formatos_documentos');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('formatos_documentos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('formato_documento_id', $id);
        return $this->db->delete('formatos_documentos');
    }


    public function editar($data, $id)
    {
        $this->db->where('formato_documento_id', $id);
        return $this->db->update('formatos_documentos', $data);
    }

}