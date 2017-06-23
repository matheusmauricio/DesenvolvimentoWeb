<?php

class ModelsUsuario {

    private $resultado;
    private $userId;
    private $dados;
    private $msg;
    private $rowCount;
    private $resultadoPaginacao;

    const Entity = 'users';

    function getResultado() {
        return $this->resultado;
    }

    function getMsg() {
        return $this->msg;
    }

    function getRowCount() {
        return $this->rowCount;
    }

    public function listar($pageId){
        $paginacao = new ModelsPaginacao(URL . 'controle-usuario/index/');
        $paginacao->condicao($pageId, 3);
        $this->resultadoPaginacao = $paginacao->paginacao('users');

        $listar = new ModelsRead();
        $listar->ExeRead('users', 'LIMIT :limit OFFSET :offset', "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");
        if ($listar->getResultado()){
            $this->resultado = $listar->getResultado();
            return array($this->resultado, $this->resultadoPaginacao);
        }else{
            //echo "Nenhum usuário encontrado<br>";
            $paginacao->paginaInvalida();
        }
    }

    public function visualizar($userId) {
        $this->userId = (int) $userId;
        $visualizar = new ModelsRead();
        $visualizar->ExeRead('users', 'WHERE id =:id LIMIT :limit', "id={$this->userId}&limit=1");
        $this->resultado = $visualizar->getResultado();
        $this->rowCount = $visualizar->getRowCount();
        return $this->resultado;
    }

    public function cadastrar(array $dados) {
        $this->dados = $dados;
        $this->validarDados();
        if ($this->resultado) {
            $this->inserir();
        }
    }

    private function validarDados(){
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);
        if (in_array('', $this->dados)){
            $this->resultado = false;
            $this->msg = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar o usuário preencha todos os campos!</div>";
        }else{
            $this->dados['password'] = md5($this->dados['password']);
            $this->resultado = true;
        }
    }

    private function inserir(){
        $create = new ModelsCreate;
        $create->ExeCreate(self::Entity, $this->dados);
        if ($create->getResultado()){
            $this->resultado = $create->getResultado();
            $this->msg = "<div class='alert alert-success'><b>Sucesso: </b>O usuário {$this->dados['nome']} foi cadastrado com sucesso!</div>";
        }
    }

    public function editar($userId, array $dados) {
        $this->userId = (int) $userId;
        $this->dados = $dados;

        $this->validarDados();
        if ($this->resultado) {
            $this->alterar();
        }
    }

    private function alterar() {
        $update = new ModelsUpdate();
        $update->ExeUpdate(self::Entity, $this->dados, "WHERE id = :id", "id={$this->userId }");
        if ($update->getResultado()) {
            $this->msg = "<div class='alert alert-success'><b>Sucesso: </b>O usuário {$this->dados['name']} foi editado no sistema!</div>";
            $this->resultado = true;
        }else {
            $this->msg = "<div class='alert alert-danger'><b>Erro: </b>O usuário {$this->dados['name']} não foi editado no sistema!</div>";
            $this->resultado = false;
        }
    }

    public function apagar($userId)
    {
        $this->dados = $this->visualizar($userId);
        var_dump($this->dados);
        if ($this->getRowCount() > 0){
            echo "O usuario existe: {$this->getRowCount()}<br />";
            $apagarUsuario = new ModelsDelete();
            $apagarUsuario->ExeDelete('users', 'WHERE id = :id', "id=$userId");
            $this->resultado = $apagarUsuario->getResultado();
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário apagado com sucesso.</div>";
        }else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Não foi encontrado o usuário.</div>";
        }
    }
}
