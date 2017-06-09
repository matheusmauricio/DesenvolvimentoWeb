<?php

class Usuario{
    private $dados; // dados a serem gravados
    private $msg; // erro ou sucesso
    private $resultado; // visualozar os dados da execução do SQL

    const entity = 'users';

    public function ExeCreate(array $dados){
        $this->dados = $dados;
        $this->validarDados();
        if ($this->resultado){
            $this->Cadastrar();
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
            $this->msg = "<p style='color:red'>Erro ao cadastrar: Todos os campos devem ser preenchidos</p>";
        }else{
            $this->dados['password'] = md5($this->dados['password']);
            $this->resultado = true;
        }
    }

    private function Cadastrar(){
        $create = new Create();
        $create->ExeCreate(self::entity, $this->dados);
        if ($create->getResultado()){
            $this->resultado = $create->getResultado();

        }
    }


}