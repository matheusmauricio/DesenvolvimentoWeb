<?php

class Usuario{
    private $dados;
    private $user;
    private $msg;
    private $resultado;

    const Entity = 'users';

    public function ExeUpdate($idUsuario, array $dados){
        $this->user = (int) $idUsuario;
        $this->dados = $dados;
        $this->validarDados();
        if ($this->resultado){
            $this->Alterar();
        }
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function getMsg(){
        return $this->msg;
    }

    private function validarDados(){
        // removendo tags html dos dados
        $this->dados = array_map('strip_tags', $this->dados);
        // retirando os espacos em branco
        $this->dados = array_map('trim', $this->dados);
        // se algum campo está em branco
        if (in_array('', $this->dados)){
            $this->resultado = false;
            $this->msg = "<p style='color:red'>Erro ao alterar: Todos os campos devem ser preenchidos</p>";
        }else{
            $this->dados['password'] = md5($this->dados['password']);
            $this->resultado = true;
        }
    }
    private function Alterar(){
        $update = new Update();
        $update->ExeUpdate(self::Entity, $this->dados, 'WHERE id = :id', "id={$this->user}");
        if ($update->getResultado()){
            $this->resultado = true;

        }else{
            $this->resultado = false;

        }
    }


}