<?php

class Documentos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_documentos()
    {
    	$this->db->join('clausulas_documentos c', 'c.clausula_documento_id = d.clausula_fk');
    	$this->db->join('areas a', 'a.area_id = d.area_fk');
    	$this->db->join('secciones s', 's.seccion_id = d.seccion_fk');
    	$this->db->join('tipos_documentos t', 't.tipo_documento_id = d.tipo_documento_fk');
        $query = $this->db->get('documentos d');
        return $query->result();
    }


    public function insertar($data)
    {
        return $this->db->insert('documentos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('documento_id', $id);
        return $this->db->delete('documentos');
    }

    public function editar($data, $id)
    {
        $this->db->where('documento_id', $id);
        return $this->db->update('documentos', $data);
    }

    public function obtener_documento($id)
    {
        $this->db->where('documento_id', $id);
        $this->db->join('secciones s', 's.seccion_id = d.seccion_fk');
        $query = $this->db->get('documentos d');
        return $query->row();
    }

    public function obtener_clausulas()
    {
        $query = $this->db->get('clausulas_documentos');
        return $query->result();
    }

    public function obtener_areas()
    {
        $query = $this->db->get('areas');
        return $query->result();
    }

    public function obtener_tipos_documentos()
    {
        $query = $this->db->get('tipos_documentos');
        return $query->result();
    }

    public function obtener_responsables()
    {
        $query = $this->db->get('responsables');
        return $query->result();
    }

    public function obtener_estados_documentos()
    {
        $query = $this->db->get('estados_documentos');
        return $query->result();
    }


}