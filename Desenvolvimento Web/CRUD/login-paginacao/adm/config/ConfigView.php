<?php

class ConfigView {

    private $nome;
    private $dados;

    public function __construct($nome, array $dados = null) {
        $this->nome = (string) $nome;
        $this->dados = $dados;
    }

    public function renderizar() {
        include 'views/include/header.php';
        include 'views/include/menu.php';
        if (file_exists('views/' . $this->nome . '.php')){
            include 'views/' . $this->nome . '.php';
        }else {
            echo "Erro ao carregar a VIEW: {$this->nome}";
        }
        include 'views/include/footer.php';
    }
    
    public function renderizarlogin(){
        if (file_exists('views/' . $this->nome . '.php')){
            include 'views/' . $this->nome . '.php';
        }
    }

    public function getDados() {
        return $this->dados;
    }
}
