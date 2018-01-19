<?php

class Ajax_Model extends CI_Model {

    const SIN_PROCESO = 1;
    const CON_PROCESO = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_secciones_por_area($id_area)
    {
        $this->db->where('area_fk', $id_area);
        $this->db->where('sin_proceso', self::CON_PROCESO);
        $query = $this->db->get('secciones');
        return $query->result();
    }

    public function obtener_procesos_por_seccion($id_seccion)
    {
        $this->db->where('seccion_fk', $id_seccion);
        $query = $this->db->get('procesos');
        return $query->result();
    }

    public function obtener_datos_por_procesos($id_proceso)
    {
        $this->db->where('proceso_fk', $id_proceso);
        $query = $this->db->get('datos');
        return $query->result();
    }

    public function obtener_indicadores_por_procesos($id_proceso)
    {
        $this->db->where('proceso_fk', $id_proceso);
        $query = $this->db->get('indicadores');
        return $query->result();
    }

    public function ver_permiso($perfil_id, $modulo_id, $accion)
    {
        $this->db->where('perfil_fk', $perfil_id);
        $this->db->where('modulo_fk', $modulo_id);
        $query = $this->db->get('permisos')->row();
        return $query->$accion;
    }


    public function obtener_seccion_por_incidencia($id_incidencia)
    {
        $this->db->where('ind.incidencia_id', $id_incidencia);
        $this->db->join('secciones sec', 'sec.seccion_id = ind.seccion_fk');
        $query = $this->db->get('incidencias ind');
        return $query->result();
    }

    public function obtener_proceso_por_incidencia($id_incidencia)
    {
        $this->db->where('ind.incidencia_id', $id_incidencia);
        $this->db->join('procesos pro', 'pro.proceso_id = ind.proceso_fk');
        $query = $this->db->get('incidencias ind');
        return $query->result();
    }


    public function obtener_riesgos_por_contexto($id_area)
    {
        $this->db->where('area_fk', $id_area);
        $this->db->where('sin_proceso', self::CON_PROCESO);
        $query = $this->db->get('secciones_calidad');
        return $query->result();
    }


    public function obtener_objetivos_por_riesgo($id_seccion)
    {
        $this->db->where('seccion_fk', $id_seccion);
        $query = $this->db->get('objetivos');
        return $query->result();
    }

}