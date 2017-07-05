<?php

class Clausulas_documentos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_clausulas_documentos()
    {
        $query = $this->db->get('clausulas_documentos');
        return $query->result();
    }


    public function obtener_clausula_documento($id)
    {
        $this->db->where('clausula_documento_id', $id);
        $query = $this->db->get('clausulas_documentos');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('clausulas_documentos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('clausula_documento_id', $id);
        return $this->db->delete('clausulas_documentos');
    }


    public function editar($data, $id)
    {
        $this->db->where('clausula_documento_id', $id);
        return $this->db->update('clausulas_documentos', $data);
    }

}