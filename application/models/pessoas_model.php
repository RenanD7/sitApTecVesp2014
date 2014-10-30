<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pessoas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('usuario', $data);
    }

    function listar() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function editar($id) {
        $this->db->where('idUsuario', $id);
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idUsuario', $data['id']);
        $this->db->set($data);
        return $this->db->update('usuario');
    }

    function deletar($id) {
        $this->db->where('idUsuario', $id);
        return $this->db->delete('usuario');
    }
}
