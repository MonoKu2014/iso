<?php

class Usuarios_Model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_usuarios()
    {
        $this->db->join('estados e', 'e.estado_id = u.estado_fk');
        $this->db->join('perfiles p', 'p.perfil_id = u.perfil_fk');
        $query = $this->db->get('usuarios u');
        return $query->result();
    }



    public function consulta_exportar()
    {
        $this->db->join('estados e', 'e.estado_id = u.estado_fk');
        $this->db->join('perfiles p', 'p.perfil_id = u.perfil_fk');
        $this->db->select('u.usuario_id, u.usuario_nombre, u.usuario_email, p.perfil, e.estado');
        return $this->db->get('usuarios u');
    }


    public function obtener_usuario($id)
    {
        $this->db->where('u.usuario_id', $id);
        $this->db->join('estados e', 'e.estado_id = u.estado_fk');
        $this->db->join('perfiles p', 'p.perfil_id = u.perfil_fk');
        $query = $this->db->get('usuarios u');
        return $query->row();
    }

    public function insertar($data)
    {
        return $this->db->insert('usuarios', $data);
    }


    public function obtener_perfiles()
    {
        $query = $this->db->get('perfiles');
        return $query->result();
    }


    public function obtener_estados()
    {
        $query = $this->db->get('estados');
        return $query->result();
    }


    public function eliminar($id)
    {
        $this->db->where('usuario_id', $id);
        return $this->db->delete('usuarios');
    }


    public function editar($data, $id)
    {
        $this->db->where('usuario_id', $id);
        return $this->db->update('usuarios', $data);
    }

}