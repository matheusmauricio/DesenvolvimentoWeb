<?php

class Read extends Conn{
    private $select; // select
    private $values; // condicoes do select
    private $msg; // erro ou sucesso
    private $resultado; // visualozar os dados da execução do SQL
    private $query;
    private $conn;

    // termo null pois a condicao não é obrigatoria
    public function ExeRead($tabela, $termos = null, $parseString = null){
        if (!empty($parseString)){
            // convertendo a string em variáveis
            parse_str($parseString, $this->values);
        }
        $this->select = "SELECT * FROM {$tabela} {$termos}";
        $this->ExecutarInstrucao();
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function getMsg(){
        return $this->msg;
    }

    private function Conexao(){
        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function getInstrucao(){
        // testa se existe valores nos termos
        if ($this->values){
            foreach ($this->values as $link => $valor){
                if (($link == 'limit') || ($link == 'offset')){
                    $valor = (int) $valor;
                }
                $this->query->bindValue(":{$link}", $valor, (is_int($valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }

    private function ExecutarInstrucao(){
        $this->Conexao();
        $this->getInstrucao();
        try{
            $this->query->execute();
            $this->resultado = $this->query->fetchAll();
        }catch (Exception $e){
            $this->resultado = null;
            $this->Msg = "<strong>Erro ao ler:</strong> {$e->getMessage()}";
        }
    }
}