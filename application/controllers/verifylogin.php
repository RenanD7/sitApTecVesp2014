<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
     $this->load->view('home_content', $data);
   $this->load->view('home_header', $data);
   $this->load->view('home_sidebar', $data);
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }
 
 }
 
 function check_database($senha)
 {
     $this->load->view('home_content', $data);
   $this->load->view('home_header', $data);
   $this->load->view('home_sidebar', $data);
   //Field validation succeeded.  Validate against database
   $nome = $this->input->post('nome');
 
   //query the database
   $result = $this->user->login($nome, $senha);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'idUsuario' => $row->idusuario,
         'nome' => $row->nome
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Nome e/ou senha incorretos');
     return false;
   }
 }
}
?>