<?php

class Tipos_documentos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_tipos_documentos()
    {
        $query = $this->db->get('tipos_documentos');
        return $query->result();
    }


    public function obtener_tipo_documento($id)
    {
        $this->db->where('tipo_documento_id', $id);
        $query = $this->db->get('tipos_documentos');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('tipos_documentos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('tipo_documento_id', $id);
        return $this->db->delete('tipos_documentos');
    }


    public function editar($data, $id)
    {
        $this->db->where('tipo_documento_id', $id);
        return $this->db->update('tipos_documentos', $data);
    }

}