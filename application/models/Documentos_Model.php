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




}