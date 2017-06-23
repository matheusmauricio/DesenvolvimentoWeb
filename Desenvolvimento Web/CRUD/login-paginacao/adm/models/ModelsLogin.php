<?php

class ModelsLogin {

    private $dados;
    private $resultado;
    private $msg;
    private $rowCount;

    function getResultado() {
        return $this->resultado;
    }

    function getMsg() {
        return $this->msg;
    }

    function getRowCount() {
        return $this->rowCount;
    }

    public function logar(array $dados){
        $this->dados = $dados;
        // valido os dados
        $this->validar();
        // se validou e não deu erro
        if ($this->resultado){
            $visulizar = new ModelsRead();
            $visulizar->ExeRead('users', 'WHERE email =:email AND password =:password LIMIT :limit', "email={$this->dados['email']}&password={$this->dados['password']}&limit=1");
            if ($visulizar->getRowCount() > 0){
                //var_dump($visulizar->getResultado());
                $this->resultado = $visulizar->getResultado();
            }else{
                $this->resultado = false;
                $this->msg = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
            }
        }
    }

    public function validar(){
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);
        if (in_array('', $this->dados)){
            $this->dados['password'] = md5($this->dados['password']);
            $this->resultado = false;
            $this->msg = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
        }else{
            $this->dados['password'] = md5($this->dados['password']);
            $this->resultado = true;
        }
    }
}
