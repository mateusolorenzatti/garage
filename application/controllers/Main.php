<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        $this->abrirCapa();
    }

    public function abrirCapa() {
        $this->load->view('header');
        $this->load->view('capa/entrada');
    }

    public function abrirCadastroeLogin() {
        $this->load->view('header');
        $this->load->view('proprietario/cadastroelogin');
        $this->load->view('footer');
    }

    public function verificaLogin() {
        $this->load->model('ProprietarioModel');

        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        if ($this->ProprietarioModel->verificaLogin($email, $senha)) {

            $proprietario = $this->ProprietarioModel->buscaProprietarioPorEmail($email);

            $this->session->set_userdata($proprietario[0]);

            $this->abrirHome();
        } else {
            $this->erroLogin($email);
        }
    }

    public function erroLogin($email) {

        if ($this->ProprietarioModel->emailCadastrado($email)) {
            $mensagem = "A senha está incorreta!";
        } else {
            $mensagem = "Email não cadastrado!";
        }

        $data['mensagem'] = $mensagem;

        $this->load->view('header');
        $this->load->view('navbars/navbarSimples');
        $this->load->view('mensagens/erroLogin', $data);
        $this->load->view('footer');
    }

    public function registrarProprietario() {
        $this->load->model('ProprietarioModel');

        $novoProprietario = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'senha' => $this->input->post('senha'),
            'telefone' => $this->input->post('telefone'));

        If ($this->ProprietarioModel->registrar($novoProprietario)) {

            //    -------------   Abrir Home   ---------------


            $p = $this->ProprietarioModel->buscaProprietarioPorEmail($novoProprietario['email']);

            $this->session->set_userdata($p[0]);

            $this->abrirHome();
        } else {
            //    --------------   Mensagem de erro ----------------

            $this->cadastroErro();
        }
    }

    public function cadastroErro() {
        $this->load->view('header');
        $this->load->view('navbars/navbarSimples');
        $this->load->view('mensagens/erroCadastro');
        $this->load->view('footer');
    }

    public function esqueciSenha() {
        
    }

    public function selecaoDeCidade() {
        $this->load->model("CidadeModel");

        $this->load->view('header');

        if (!($this->session->userdata('nome') == NULL)) {
            $this->load->view('navbars/navbarUserdata');
        } else {
            $this->load->view('navbars/navbarSimples');
        }

        $data['cidades'] = $this->CidadeModel->todasCidades();

        $this->load->view('oficina/selecaoDeCidade', $data);
        $this->load->view('footer');
    }

    public function mostrarOficinas() {
        $this->load->model("OficinaModel");
        $this->load->model("CidadeModel");

        //Consultar dados da oficina e cidade

        $idCidade = $this->input->post('cidade');

        $data["cidade"] = $this->CidadeModel->buscaCidadePorId($idCidade);

        $data["oficinas"] = $this->OficinaModel->oficinasPorCidade($idCidade);

        // Abrindo a view, com condição para usuario logado ou não

        $this->load->view('header');

        if (!($this->session->userdata('nome') == NULL)) {
            $this->load->view('navbars/navbarUserdata');
        } else {
            $this->load->view('navbars/navbarSimples');
        }

        $this->load->view('oficina/todasOficinasNaCidade', $data);
        $this->load->view('footer');
    }

    public function telaInicialOficinas() {
        if (!($this->session->userdata('nome') == NULL)) {
            $this->abrirHome();
        } else {
            $this->index();
        }
    }
    
    public function abrirHome() {
        $base = base_url();
        
        redirect($base.'Main/abrirHomePage');  
    }

    public function abrirHomePage() {
        //Consultar veículos pertencentes ao proprietario e que estejam em serviço
        $this->load->model('ProprietarioModel');

        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');

        $this->load->view('home/cabecalho');

        $emServiço = $this->ProprietarioModel->veículosEmServiço($this->session->userdata('idProprietario'));

        if (empty($emServiço[0])) {
            $this->load->view('home/semServico');
        } else {
            $this->load->model('ServicoModel');

            for ($i = 0; $i < count($emServiço); $i++) {
                $serviços[$i] = $this->ServicoModel->dadosRapidos($emServiço[$i]);

                //Se está em análise, ainda não existem itens visíveis

                if ($serviços[$i]['status'] != "Em análise") {

                    $serviços[$i]['porcentagem'] = $serviços[$i]['quantItensConcluidos'] * 100 / $serviços[$i]['quantItens'];

                    $serviços[$i]['porcentagem'] = number_format($serviços[$i]['porcentagem'], 1);
                }
            }

            $data['serviços'] = $serviços;

            $this->load->view('home/mostrarProgresso', $data);
        }

        //Consultar os veículos do cliente e opção de adicionar novo

        $veiculos = $this->ProprietarioModel->meusVeículos($this->session->userdata('idProprietario'));

        $data['veiculos'] = $veiculos;

        $this->load->view('home/meusVeiculos', $data);

        $this->load->view('home/rodape');
        $this->load->view('footer');
    }

    public function logout() {
        $this->session->sess_destroy();

        $this->index();
    }

    public function abrirAdicionarVeiculo() {
        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('veiculo/adicionarVeiculo');
        $this->load->view('footer');
    }

    public function adicionarVeiculo() {
        $this->load->model("VeiculoModel");

        $veiculo = array(
            'marca' => $this->input->post('marca'),
            'modelo' => $this->input->post('modelo'),
            'placa' => $this->input->post('placa'),
            'renavam' => $this->input->post('renavam'),
            'ano' => $this->input->post('ano'),
            'cor' => $this->input->post('cor')
        );

        if ($this->VeiculoModel->adicionarVeiculo($veiculo)) {
            //  Retornar para a home, agora com o novo veiculo

            $this->abrirHome();
        } else {
            // Mensagem de erro, prossibilitando retorno a home po tentar novamente

            $this->erroAdicionarVeiculo();
        }
    }

    public function erroAdicionarVeiculo() {
        $this->load->view('header');
        $this->load->view('navbars/navbarSimples');
        $this->load->view('mensagens/erroAdicionarVeiculo');
        $this->load->view('footer');
    }

    public function informacoesVeiculo($id) {
        $this->load->model("VeiculoModel");

        $veiculo = $this->VeiculoModel->veiculoPorId($id);

        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('veiculo/informacoesVeiculo', $veiculo);
        $this->load->view('footer');
    }

    public function abrirEditarVeiculo($idVeiculo) {
        $this->load->model("VeiculoModel");

        $veiculo = $this->VeiculoModel->veiculoPorId($idVeiculo);

        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('veiculo/editarVeiculo', $veiculo);
        $this->load->view('footer');
    }

    public function editarVeiculo() {
        $this->load->model("VeiculoModel");

        $idVeiculo = $this->input->post('idVeiculo');

        $veiculoAlterado = array(
            'modelo' => $this->input->post('modelo'),
            'marca' => $this->input->post('marca'),
            'placa' => $this->input->post('placa'),
            'ano' => $this->input->post('ano'),
            'renavam' => $this->input->post('renavam'),
            'cor' => $this->input->post('cor')
        );

        if ($this->VeiculoModel->editarVeiculo($veiculoAlterado, $idVeiculo)) {
            $this->informacoesVeiculo($idVeiculo);
        } else {
            $this->erroAlterarVeiculo($idVeiculo);
        }
    }

    public function erroAlterarVeiculo($id) {
        $data['idVeiculo'] = $id;

        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('mensagens/erroAltararVeiculo', $data);
        $this->load->view('footer');
    }

    public function excluirVeiculo($idVeiculo) {
        $this->load->model("VeiculoModel");

        if ($this->VeiculoModel->excluirVeiculo($idVeiculo)) {
            $this->abrirHome();
        } else {
            $this->erroExcluirVeiculo($idVeiculo);
        }
    }

    public function erroExcluirVeiculo($id) {
        $data['idVeiculo'] = $id;

        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('mensagens/erroExcluirVeiculo', $data);
        $this->load->view('footer');
    }

    public function informacoesOficina($idOficina) {
        $this->load->model("OficinaModel");
        $this->load->model("CidadeModel");

        $oficina = $this->OficinaModel->dadosOficina($idOficina);
        $oficina['senha'] = NULL;

        $oficina['cidadeNome'] = $this->CidadeModel->buscaNomeDaCidadePorId($oficina['cidade']);
        
        $oficina['telefones'] = $this->OficinaModel->telefonesDaOficina($idOficina);

        $this->load->view('header');
        if (!($this->session->userdata('nome') == NULL)) {
            $this->load->view('navbars/navbarUserdata');
        } else {
            $this->load->view('navbars/navbarSimples');
        }
        $this->load->view('oficina/informacoesOficina', $oficina);
        $this->load->view('footer');
    }
    
    public function voltarOficinaInfo(){
        if (!($this->session->userdata('nome') == NULL)) {
            $this->abrirHome();
        } else {
            $this->selecaoDeCidade();
        }
    }

    public function mostrarMeuPerfil() {
        $this->load->model('ProprietarioModel');
        $data = $this->session->userdata();
        
        $data['quantVeiculos'] = $this->ProprietarioModel->quantidadeDeVeiculos($this->session->userdata("idProprietario"));
        $data['quantServiços'] = $this->ProprietarioModel->quantidadeDeServiços($this->session->userdata("idProprietario"));
        
        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('proprietario/perfil', $data);
        $this->load->view('footer');
    }
    
    public function abrirEditarPerfil() {
        $data = $this->session->userdata();
        
        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('proprietario/editarPerfil', $data);
        $this->load->view('footer');
    }
    
    public function editarPerfil() {
        $this->load->model('ProprietarioModel');
        
        $proprietario = array(
            'nome' => $this->input->post('nome'),
            'telefone' => $this->input->post('telefone'));
         
        if($this->ProprietarioModel->editarPerfil($this->session->userdata("idProprietario"), $proprietario)){
            $this->session->set_userdata($this->ProprietarioModel->buscaProprietarioPorId($this->session->userdata("idProprietario")));
            
            $this->mostrarMeuPerfil();
        }else{
            $this->erroEditarPerfil();
        } 
    }
    
    public function erroEditarPerfil() {
        $this->load->view('header');
        $this->load->view('navbars/navbarUserdata');
        $this->load->view('mensagens/erroEditarPerfil');
        $this->load->view('footer');
    }
    
}
