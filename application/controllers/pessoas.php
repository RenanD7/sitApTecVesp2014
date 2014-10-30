<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pessoas extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
        $this->load->model('pessoas_model');
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Pessoas";
        $data['pessoas'] = $this->pessoas_model->listar();
        $this->load->view('pessoas_view.php', $data);
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
            $data['foto'] = $this->input->post('foto');
            $data['telefone'] = $this->input->post('telefone');
            

            /* Carrega o modelo */
            $this->load->model('pessoas_model');

            /* Chama a função inserir do modelo */
            if ($this->pessoas_model->inserir($data)) {
                redirect('pessoas');
            } else {
                log_message('error', 'Erro ao inserir o usuário.');
            }
        }
    }

    function editar($id) {

        /* Aqui vamos definir o titulo da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Pessoa";

        /* Carrega o modelo */
        $this->load->model('pessoas_model');

        /* Busca os dados da pessoa que será editada (id) */
        $data['dados_pessoa'] = $this->pessoas_model->editar($id);

        /* Carrega a p�gina de edi��o com os dados da pessoa */
        $this->load->view('pessoas_edit', $data);
    }

    function atualizar() {

        /* Carrega a biblioteca do CodeIgniter respons�vel pela valida��o dos formul�rios */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro ser� exibida na p�gina */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Aqui estou definindo as regras de valida��o do formul�rio, assim como 
          na fun��o inserir do controlador, por�m estou mudando a forma de escrita */
        $validations = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[40]'
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|max_length[100]'
            ),
            array(
                'field' => 'foto',
                'label' => 'Foto',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'Endereço',
                'label' => 'Endereço',
                'rules' => 'trim|required|max_length[50]'
            ),
        );
        $this->form_validation->set_rules($validations);

        /* Executa a valida��o... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama fun��o editar do controlador novamente */
            $this->editar($this->input->post('id'));
        } else {
            /* Sen�o obt�m os dados do formul�rio */
            $data['id'] = $this->input->post('id');
            $data['nome'] = ucwords($this->input->post('nome'));
            $data['email'] = strtolower($this->input->post('email'));

            /* Carrega o modelo */
            $this->load->model('pessoas_model');

            /* Executa a fun��o atualizar do modelo passando como par�metro os dados obtidos do formul�rio */
            if ($this->pessoas_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a p�gina principal */
                redirect('pessoas');
            } else {
                /* Sen�o exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o usuário.');
            }
        }
    }

    function deletar($id) {

        /* Carrega o modelo */
        $this->load->model('pessoas_model');

        /* Executa a fun��o deletar do modelo passando como par�metro o id da pessoa */
        if ($this->pessoas_model->deletar($id)) {
            /* Caso sucesso ao atualizar, recarrega a p�gina principal */
            redirect('pessoas');
        } else {
            /* Sen�o exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar o usuário.');
        }
    }

}
