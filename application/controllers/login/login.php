<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        // VALIDATION RULES
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');


        // MODELO MEMBERSHIP
        $this->load->model('membros_model', 'usuario');
        $query = $this->usuario->validate();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login_view');
        } else {

            if ($query) { // VERIFICA LOGIN E SENHA
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'logged' => true
                );
                $this->session->set_userdata($data);
                redirect('area_restrita');
            } else {
                redirect($this->index());
            }
        }
    }
}