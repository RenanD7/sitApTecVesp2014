<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_restrita extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('membros_model', 'usuario');
        $this->usuario->logged();
    }
    
    public function index() {
        
        $this->load->view('area_restrita_view');
        
    }
}