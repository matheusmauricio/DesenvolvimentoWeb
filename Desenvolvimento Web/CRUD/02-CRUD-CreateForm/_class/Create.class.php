<?php

class Create extends Conn{
    private $tabela; // tabela do BD
    private $dados; // dados a serem gravados
    private $msg; // erro ou sucesso
    private $resultado; // visualozar os dados da execução do SQL
    private $query; // sql
    private $conn; // conexao com o BD

    public function ExeCreate($tabela, array $dados){
        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->getInstrucao();
        $this->ExecutarInstrucao();
    }

    // Usada no futuro
    public function getResultado(){
        return $this->resultado;
    }

    // Usada no futuro
    public function getMsg(){
        return $this->msg;
    }

    private function conexao(){
        $this->conn = parent::getConn();
        // prepara a string para o formato de PDO
        $this->query = $this->conn->prepare($this->query);
    }

    // montando a SQL
    private function getInstrucao(){
        $keys = implode(', ', array_keys($this->dados));
        $values = ':' .implode(', :', array_keys($this->dados));
        $this->query = "INSERT INTO {$this->tabela} ({$keys}) VALUES ({$values})";
    }

    private function ExecutarInstrucao(){
        $this->conexao();
        try{
            $this->query->execute($this->dados);
            $this->resultado = $this->conn->lastInsertId();
        }catch (Exception $e){
            $this->resultado = null;
            $this->msg = "<strong>Erro ao cadastrar</strong> {$e->getMessage()}";
        }
    }
}