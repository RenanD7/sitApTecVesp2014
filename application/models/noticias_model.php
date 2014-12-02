<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        //Inserção na tabela artigo
        return $this->db->insert('artigo', $data);
    }

    function listar() {
        //Listagem da tabela usuario
        //Da maior para a menor - DATE
        $query = $this->db->order_by('data', 'desc')->get('artigo');
        return $query->result();
    }

    function editar($idArtigo) {
        $this->db->where('idArtigo', $idArtigo);
        $query = $this->db->get('artigo');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idArtigo', $data['idArtigo']);
        $this->db->set($data);
        return $this->db->update('artigo');
    }

    function deletar($idArtigo) {
        $this->db->where('idArtigo', $idArtigo);
        return $this->db->delete('artigo');
    }

}

/* End of file usuarios_model.php */
/* Location ./application/views/usuarios_model.php */