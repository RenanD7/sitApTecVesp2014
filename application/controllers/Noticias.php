<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticias extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->model('noticias_model');
    }

    public function index()
	{
                $data['noticias'] = $this->noticias_model->listar();
		$this->load->view('home_header');
                //É aqui que deve ser carregadas as noticias.
                //$this->load->view('home_content_noticia');
                $this->load->view('home_content', $data);
                $this->load->view('home_sidebar');
	}
    
    public function cadastro() {

        if ($this->login->logado()) {
            //$this->load->view('login/area_restrita_view');
            $this->load->view('home_header');
            $this->load->view('home_content_cadastro_noticia');
            $this->load->view('home_sidebar');
        } else {
            redirect('login');
        }
    }
}
