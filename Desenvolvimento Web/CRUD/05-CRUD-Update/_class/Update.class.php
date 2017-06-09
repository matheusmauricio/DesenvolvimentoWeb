<?php

class Update extends Conn{
    private $tabela; // tabela a ser atualizada
    private $dados;  // Dados que virão, futuramente do formulario
    private $termos; // Condicoes para atualização. Ex.: id = 3
    private $values; // valores a serem atualizados
    private $msg; // erro ou sucesso
    private $resultado; // visualizar os dados da execução do SQL
    private $query;  // manipular a query
    private $conn;  // manipular a Conexao com o BD

    // termo null pois a condicao não é obrigatoria
    public function ExeUpdate($tabela, array $dados, $termos, $parseString){
        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->termos = (string) $termos;
        // convertendo a string em variáveis
        parse_str($parseString, $this->values);
        $this->ExecutarInstrucao();
    }


    public function getResultado(){
        return $this->resultado;
    }

    public function getMsg(){
        return $this->msg;
    }

    public function getRowCount(){
        return $this->query->rowCount;
    }

    private function Conexao(){
        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->query);
    }

     private function getInstrucao(){
        foreach ($this->dados as $key => $valor){
            $values[] = $key .' = :' .$key;
        }
        $values = implode(', ', $values);
        $this->query = "UPDATE {$this->tabela} SET {$values} {$this->termos}";
    }

    private function ExecutarInstrucao(){
        $this->getInstrucao();
        $this->Conexao();
        try{
            $this->query->execute(array_merge($this->dados, $this->values));
            $this->resultado = true;
            $this->Msg = "<strong>Atualizado com sucesso</strong>";
        }catch (PDOException $e){
            $this->resultado = null;
            $this->Msg = "<strong>Erro ao Atualizar:</strong> {$e->getMessage()}";
        }
    }
}