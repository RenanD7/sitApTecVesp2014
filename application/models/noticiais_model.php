<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticias_model extends CI_Model {
    
     function listar() {
        //Listagem da tabela artigo
        $query = $this->db->order_by('titulo', 'asc')->get('artigo');
        return $query->result();
    }
}