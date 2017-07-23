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


    public function ver_permiso($perfil_id, $modulo_id, $accion)
    {
        $this->db->where('perfil_fk', $perfil_id);
        $this->db->where('modulo_fk', $modulo_id);
        $query = $this->db->get('permisos')->row();
        return $query->$accion;
    }


    public function cambiar_permiso($perfil_id, $modulo_id, $data)
    {
        $this->db->where('perfil_fk', $perfil_id);
        $this->db->where('modulo_fk', $modulo_id);
        return $this->db->update('permisos', $data);
    }


}