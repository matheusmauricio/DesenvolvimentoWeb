<?php


  class Produto{
    public $preco;
    public $nome;

    public function __construct($preco, $nome){
      $this->preco = $preco;
      $this->nome = $nome;

    }

    public function verProduto(){
      $aux = number_format($this->preco, 2, ',', '.');
      return "<p>Produto: {$this->nome} e Preço: {$aux} </p>";
    }


  }


?>
