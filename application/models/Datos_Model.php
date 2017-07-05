<?php

class Datos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_datos()
    {
        $this->db->join('procesos p', 'p.proceso_id = d.proceso_fk');
        $this->db->join('secciones s', 's.seccion_id = d.seccion_fk');
        $this->db->join('areas a', 'a.area_id = d.area_fk');
        $query = $this->db->get('datos d');
        return $query->result();
    }


    public function obtener_dato($id)
    {
        $this->db->where('dato_id', $id);
        $query = $this->db->get('datos');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('datos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('dato_id', $id);
        return $this->db->delete('datos');
    }


    public function editar($data, $id)
    {
        $this->db->where('dato_id', $id);
        return $this->db->update('datos', $data);
    }

    public function areas()
    {
        return $this->db->get('areas')->result();
    }

    public function secciones_por_area()
    {
        $this->db->where('area_fk', $this->input->post('area_id'));
        return $this->db->get('secciones')->result();
    }

    public function procesos_por_seccion()
    {
        $this->db->where('proceso_fk', $this->input->post('proceso_id'));
        return $this->db->get('procesos')->result();     
    }

}