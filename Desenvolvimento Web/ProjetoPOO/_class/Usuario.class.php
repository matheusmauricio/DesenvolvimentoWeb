<?php

class Usuario{
  public $nome;
  public $endereco;

  public function __construct($nome, $endereco){
    $this->nome = $nome;
    $this->endereco = $endereco;
  }

  public function verUsuario(){
    return "<p>Nome: {$this->nome} e Endereço: {$this->endereco} </p>";
  }
}

?>
