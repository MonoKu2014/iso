<?php

class Indicadores_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_indicadores()
    {
        $query = $this->db->get('indicadores');
        return $query->result();
    }


    public function obtener_indicador($id)
    {
        $this->db->where('indicador_id', $id);
        $query = $this->db->get('indicadores');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('indicadores', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->delete('indicadores');
    }


    public function editar($data, $id)
    {
        $this->db->where('indicador_id', $id);
        return $this->db->update('indicadores', $data);
    }

    public function areas()
    {
        return $this->db->get('areas')->result();
    }

}