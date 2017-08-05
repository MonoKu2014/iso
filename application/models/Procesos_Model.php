<?php

class Procesos_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_procesos()
    {
        $query = $this->db->get('procesos');
        return $query->result();
    }


    public function obtener_proceso($id)
    {
        $this->db->where('p.proceso_id', $id);
        $this->db->join('secciones s', 's.seccion_id = p.seccion_fk');
        $query = $this->db->get('procesos p');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('procesos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('proceso_id', $id);
        return $this->db->delete('procesos');
    }


    public function editar($data, $id)
    {
        $this->db->where('proceso_id', $id);
        return $this->db->update('procesos', $data);
    }

    public function areas()
    {
        return $this->db->get('areas')->result();
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