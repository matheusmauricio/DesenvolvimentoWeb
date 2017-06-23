<?php

class ControleLogin {

    private $dados;
    private $diretorio;
    private $classe;
    private $id;

    public function login(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['SendLogin'])){
            // apago o botao, pois não me interessa
            unset($this->dados['SendLogin']);
            $login = new ModelsLogin();
            // chamo o método logar, passando o email e a senha
            $login->logar($this->dados);
            // verifica se há resultado encontrado
            if (!$login->getResultado()) {
                // recebe a msg de erro
                $_SESSION['msg'] = $login->getMsg();
            } else {
                // recebe os dados encontrado e cria as sessões equivalentes
                $this->dados = $login->getResultado();
                $_SESSION['id'] = $this->dados[0]['id'];
                $_SESSION['nome'] = $this->dados[0]['nome'];
                $_SESSION['email'] = $this->dados[0]['email'];
                // cria a url e redireciona o usuario
                $urlDestino = URL . 'controle-home/index';
                header("Location: $urlDestino");
            }
        }else{
            $this->dados = null;
        }

        // instancia um view, acrescentando a extensão etc.
        $carregarView = new ConfigView("login/login", $this->dados);
        // Após instanciar, renderiza (inclui a view)
        $carregarView->renderizarlogin();
    }

    public function logout() {
        unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);
        $_SESSION['msg'] = "<div class='alert alert-success'>Deslogado com sucesso</div>";
        $urlDestino = URL . 'controle-login/login';
        header("Location: $urlDestino");
    }
}
