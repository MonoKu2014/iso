<?php

class Reportes_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function areas()
    {
        $query = $this->db->get('areas');
        return $query->result();
    }


    public function documentos_filtrados($area, $seccion)
    {
        $this->db->where('area_fk', $area);
        $this->db->where('seccion_fk', $seccion);
        return $this->db->get('documentos')->result();
    }


    public function secciones()
    {
        $query = $this->db->get('secciones');
        return $query->result();
    }


}