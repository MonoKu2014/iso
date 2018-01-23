<?php

class Calidad_incidencias_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_calidad_incidencias()
    {
        $this->db->join('secciones s', 's.seccion_id = i.seccion_fk');
        $this->db->join('procesos p', 'p.proceso_id = i.proceso_fk');
        $this->db->join('origenes_incidencias o', 'o.origen_incidencia_id = i.origen_fk');
        $this->db->join('tipos_incidencias t', 't.tipo_incidencia_id = i.tipo_fk');
        $this->db->join('causas_incidencias c', 'c.causa_incidencia_id = i.causa_fk');
        $query = $this->db->get('calidad_incidencias i');
        return $query->result();
    }


    public function obtener_calidad_incidencia($id)
    {
        $this->db->where('i.incidencia_id', $id);
        $this->db->join('secciones s', 's.seccion_id = i.seccion_fk');
        $this->db->join('procesos p', 'p.proceso_id = i.proceso_fk');
        $this->db->join('origenes_incidencias o', 'o.origen_incidencia_id = i.origen_fk');
        $this->db->join('tipos_incidencias t', 't.tipo_incidencia_id = i.tipo_fk');
        $this->db->join('causas_incidencias c', 'c.causa_incidencia_id = i.causa_fk');
        $query = $this->db->get('calidad_incidencias i');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('calidad_incidencias', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('incidencia_id', $id);
        return $this->db->delete('calidad_incidencias');
    }


    public function editar($data, $id)
    {
        $this->db->where('incidencia_id', $id);
        return $this->db->update('calidad_incidencias', $data);
    }

    public function secciones()
    {
        return $this->db->get('secciones')->result();
    }

    public function origenes()
    {
        return $this->db->get('origenes_incidencias')->result();
    }

    public function tipos()
    {
        return $this->db->get('tipos_incidencias')->result();
    }

    public function responsables()
    {
        $this->db->order_by('responsable', 'asc');
        return $this->db->get('responsables')->result();
    }


    public function causas()
    {
        return $this->db->get('causas_incidencias')->result();
    }

}