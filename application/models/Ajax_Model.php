<?php

class Ajax_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_secciones_por_area($id_area)
    {
        $this->db->where('area_fk', $id_area);
        $query = $this->db->get('secciones');
        return $query->result();
    }

    public function obtener_procesos_por_seccion($id_seccion)
    {
        $this->db->where('seccion_fk', $id_seccion);
        $query = $this->db->get('procesos');
        return $query->result();
    }


}