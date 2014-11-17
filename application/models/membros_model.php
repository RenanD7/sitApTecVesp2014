<?php
class membros_model extends CI_Model {

    # VALIDA USUÁRIO
    function validate() {
        $this->db->where('nome', $this->input->post('nome')); 
        $this->db->where('senha', md5($this->input->post('senha')));

        $query = $this->db->get('usuario'); 

        if ($query->num_rows == 1) { 
            return true; // RETORNA VERDADEIRO
        }
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina. Efetuar Login</a>';
            die();
        }
    }
}