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
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');


        // MODELO MEMBERSHIP
        //$this->load->model('membership_model', 'membership');
        $query = $this->membership->validate();

        if ($this->form_validation->run() == FALSE) {

            //$this->load->view('login/login_view');
            $this->load->view('home_header');
            $this->load->view('home_content_login');
            $this->load->view('home_sidebar');
        } else {

            if ($query) { // VERIFICA LOGIN E SENHA
                $data = array(
                    'username' => $this->input->post('username'),
                    'logged' => true
                );
                $this->session->set_userdata($data);
                redirect('login/area_restrita');
            } else {
                redirect($this->index());
            }
        }
    }

}
