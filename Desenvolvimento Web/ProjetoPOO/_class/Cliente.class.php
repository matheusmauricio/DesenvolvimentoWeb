<?php

  class Cliente{
    public $nome;
    public $idade;

    public function __construct($nome, $idade){
      $this->nome = (String)$nome;
      $this->idade = (int)$idade;
    }

    
    public function setNome($nome){
      $this->nome = $nome;
    }

    public function setIdade($idade){
      $this->idade = $idade;
    }

    public function verCliente(){

      return "<p> Nome: {$this->nome} e Idade: {$this->idade} </p>";
    }


  }


?>
