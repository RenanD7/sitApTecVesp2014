<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        //Inserção na tabela usuario
        return $this->db->insert('usuario', $data);
    }

    function listar() {
        //Listagem da tabela usuario
        $query = $this->db->order_by('nome', 'asc')->get('usuario');
        return $query->result();
    }

    function editar($idUsuario) {
        $this->db->where('idUsuario', $idUsuario);
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idUsuario', $data['idUsuario']);
        $this->db->set($data);
        return $this->db->update('usuario');
    }

    function deletar($idusuario) {

        //Busca os dados no banco
        $busca = $this->editar($idusuario);
      
        $caminho = "c:/xampp/htdocs/sitApTecVesp2014/assets/images/";
        $arquivo = $caminho . $busca[0]->foto;

        if (is_file($arquivo)){
            unlink ($arquivo);
        }

        $this->db->where('idUsuario', $idusuario);
        return $this->db->delete('usuario');
    }

}

/* End of file usuarios_model.php */
/* Location ./application/views/usuarios_model.php */