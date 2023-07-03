<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('usuarios');
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $user = new stdClass();
            $user->id = $row->id;
            $user->username = $row->username;
            return $user;
        } else {
            return false;
        }
    }

	public function crearUsuario($userData)
    {
        $this->db->insert('usuarios', $userData);
    }
}
