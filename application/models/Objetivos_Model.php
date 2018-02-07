<?php

class Objetivos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_objetivos()
    {
        $query = $this->db->get('objetivos');
        return $query->result();
    }


    public function obtener_objetivo($id)
    {
        $this->db->where('objetivo_id', $id);
        $query = $this->db->get('objetivos');
        return $query->row();
    }


    public function obtener_objetivo_completo($id, $tipo)
    {
        $this->db->where('p.objetivo_id', $id);
        $this->db->join('secciones_calidad s', 's.seccion_id = p.seccion_fk');

        if($tipo == 3){
            $this->db->join('datos d', 'd.dato_id = p.dato_superior_fk');
            $this->db->join('datos dos', 'dos.dato_id = p.dato_superior_fk');
            $this->db->select('p.*, d.dato_nombre, dos.dato_nombre, s.seccion_id, s.seccion');
        } else {
            $this->db->select('p.*, s.seccion_id, s.seccion');
        }

        $query = $this->db->get('objetivos p');
        return $query->row();
    }


    public function insertar($data)
    {
        return $this->db->insert('objetivos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('objetivo_id', $id);
        return $this->db->delete('objetivos');
    }


    public function editar($data, $id)
    {
        $this->db->where('objetivo_id', $id);
        return $this->db->update('objetivos', $data);
    }

    public function areas()
    {
        return $this->db->get('areas_calidad')->result();
    }

    public function obtener_estados()
    {
        $query = $this->db->get('estados');
        return $query->result();
    }


    public function obtener_responsables()
    {
        $query = $this->db->get('responsables');
        return $query->result();
    }


}