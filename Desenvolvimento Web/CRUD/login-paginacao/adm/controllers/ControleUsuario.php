<?php

class ControleUsuario {

    private $dados;
    private $userId;
    private $pageId;

    public function index($pageId = null) {
        $this->pageId = ((int) $pageId ? $pageId : 1);
        //echo "Número da página: {$this->pageId}<br>";
        
        $listarUsuarios = new ModelsUsuario();
        $this->dados = $listarUsuarios->listar($this->pageId);
        $carregarView = new ConfigView("usuario/listarUsuario", $this->dados);
        $carregarView->renderizar();
    }

    public function cadastrar()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($dados['SendCadUsuario'])){
            unset($dados['SendCadUsuario']);

            $cadUsuario = new ModelsUsuario();
            $cadUsuario->cadastrar($dados);
            if (!$cadUsuario->getResultado()) {
                $_SESSION['msg'] = $cadUsuario->getMsg();
            } else {
                $_SESSION['msgcad'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
                $urlDestino = URL . 'controle-usuario/index';
                header("Location: $urlDestino");
            }
        }else{
            $dados = null;
        }

        $carregarView = new ConfigView("usuario/cadastrarUsuario", $dados);
        $carregarView->renderizar();
    }

    public function visualizar($userId = null) {
        $this->userId = (int) $userId;
        if (!empty($this->userId)) {
            $verUsuario = new ModelsUsuario();
            $this->dados = $verUsuario->visualizar($userId);
            $carregarView = new ConfigView("usuario/visualizarUsuario", $this->dados);
            $carregarView->renderizar();
        }else {
            $_SESSION['msg'] = "Necessário selecionar um usuário<br />";
            $urlDestino = URL . 'controle-usuario/index';
            header("Location: $urlDestino");
        }
    }

    public function editar($userId = null) {
        $this->userId = (int) $userId;
        if (!empty($this->userId)) {
            $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterar();
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário editado com sucesso</div>";
            $carregarView = new ConfigView("usuario/editarUsuario", $this->dados);
            $carregarView->renderizar();
        }else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um usuário</div>";
            $urlDestino = URL . 'controle-usuario/index';
            header("Location: $urlDestino");
        }
    }

    private function alterar() {
        if (!empty($this->dados['SendEditUsuario'])) {
            unset($this->dados['SendEditUsuario']);
            $editarUsuario = new ModelsUsuario();
            $editarUsuario->editar($this->userId, $this->dados);
            if (!$editarUsuario->getResultado()) {
                $this->dados['msg'] = $editarUsuario->getMsg();
            } else {
                $this->dados['msg'] = $editarUsuario->getMsg();
                $urlDestino = URL . 'controle-usuario/visualizar/' . $this->userId;
                header("Location: $urlDestino");
            }
        }else {
            $verUsuario = new ModelsUsuario();
            $this->dados = $verUsuario->visualizar($this->userId);
            if ($verUsuario->getRowCount() <= 0) {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um usuário</div>";
                $urlDestino = URL . 'controle-usuario/index';
                header("Location: $urlDestino");
            }
            //var_dump($this->dados);
        }
    }

    public function apagar($userId = null) {
        $this->userId = (int) $userId;
        if (!empty($this->userId)) {
            echo "Usuário a ser apagado: {$this->userId}<br />";
            $apagarUsuario = new ModelsUsuario();
            $apagarUsuario->apagar($this->userId);
        }else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um usuário</div>";
        }

        $urlDestino = URL . 'controle-usuario/index';
        header("Location: $urlDestino");
    }
}
