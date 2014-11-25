<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
        $this->load->model('usuarios_model');
    }

    function index() {
        //$data['titulo'] = "CRUD com CodeIgniter | Cadastro de Usuarios";
        $data['usuarios'] = $this->usuarios_model->listar();
        //$this->load->view('usuarios_view.php', $data);

        $this->load->view('home_header');
        $this->load->view('home_content_usuario', $data);
        $this->load->view('home_sidebar');
    }

    function inserir() {
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');
        /* Define as tags onde a mensagem de erro sera exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        /* Define as regras para valida��o */
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[40]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|max_length[12]');
        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Sendo, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->input->post('senha');
            $data['email'] = $this->input->post('email');
            $data['telefone'] = $this->input->post('telefone');
            
            /*
             * Envio da imagem
             */
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '800';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
                
                $this->load->view('home_header');
                $this->load->view('home_content_usuario', $error);
                $this->load->view('home_sidebar');
            
                
            } else {//Arquivo enviado!
                //$data = array('upload_data' => $this->upload->data());
                //$this->load->view('upload_success', $data);
                
                $foto = $this->upload->data();
                //var_dump($foto); die();
                $data['foto'] = $foto['file_name'];
            }

            //FIM DO ENVIO DA IMAGEM

            /* Carrega o modelo */
            //$this->load->model('usuarios_model');
            /* Chama a função inserir do modelo */
            if ($this->usuarios_model->inserir($data)) {
                redirect('usuarios');
            } else {
                log_message('error', 'Erro ao inserir o usuário.');
            }
        }
    }

    function editar($idUsuario) {
        /* Aqui vamos definir o titulo da página de edição */
        //$data['titulo'] = "CRUD com CodeIgniter | Editar Usuario";
        /* Carrega o modelo */
        //$this->load->model('usuarios_model');
        /* Busca os dados da pessoa que será editada (id) */
        $data['dados_usuario'] = $this->usuarios_model->editar($idUsuario);
        /* Carrega a página de edição com os dados da pessoa */

        $this->load->view('home_header');
        $this->load->view('home_content_usuario_edit', $data);
        $this->load->view('home_sidebar');
    }

    function atualizar() {
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');
        /* Define as tags onde a mensagem de erro ser� exibida na p�gina */
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        /* Aqui estou definindo as regras de validação do formulário, assim como 
          na função inserir do controlador, porém estou mudando a forma de escrita */
        $validations = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|max_length[40]'
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'trim|max_length[20]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|valid_email|max_length[70]'
            ),
            array(
                'field' => 'foto',
                'label' => 'Foto',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'endereço',
                'label' => 'Endereço',
                'rules' => 'trim|max_length[50]'
            )
        );
        $this->form_validation->set_rules($validations);
        /* Executa a valida��o... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            // echo 'falho a validação: ' . $this->input->post('idusuario') . $this->input->post('nome'); die();
            $this->editar($this->input->post('idusuario'));
        } else {
            /* Senão obtém os dados do formulário */
            //  echo 'validado'; die();
            $data['idUsuario'] = $this->input->post('idusuario');
            $data['nome'] = ucwords($this->input->post('nome'));
            $data['senha'] = $this->input->post('senha');
            $data['email'] = strtolower($this->input->post('email'));
            $data['foto'] = $this->input->post('foto');
            $data['telefone'] = $this->input->post('telefone');
            /* Carrega o modelo */
            //$this->load->model('usuarios_model');
            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->usuarios_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('usuarios');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o usuário.');
            }
        }
    }

    function deletar($idUsuario) {
        /* Carrega o modelo */
        //$this->load->model('pessoas_model');
        /* Executa a função deletar do modelo passando como parâmetro o id da pessoa */
        if ($this->usuarios_model->deletar($idUsuario)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('usuarios');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar o usuário.');
        }
    }

}

/* End of file usuarios.php*/
/* Location ./application/controllers/usuarios.php */