<?php

class ConfigController
{

    private $url; // a url atual
    private $urlConjunto; // url em formato de array
    private $urlController; // url do controller, ou seja, a classe
    private $urlMetodo; // url do método da referida classe
    private $urlParamentro; // parâmetros: id=3, para editar o id 3
    private static $format;  // retirar códigos maliciosos, tipo html

    public function __construct()
    {
        // se a url esta passando valores
        $flag = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
        if (!empty($flag)){
            // pega a url atual
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            // elimina tags html, espaços em branco etc.
            $this->limparurl();
            // quebra a url para separar o controller, método e parâmetro
            $this->urlConjunto = explode("/", $this->url);
            //echo $this->url;

            // trata o controller, caso exista
            if (isset($this->urlConjunto[0])){
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            }

            // trata o método, caso exista
            if (isset($this->urlConjunto[1])){
                $this->urlMetodo = $this->slugMetodo($this->urlConjunto[1]);
            }

            // trata o parâmetro, caso exista
            if (isset($this->urlConjunto[2])){
                $this->urlParamentro = $this->slugMetodo($this->urlConjunto[2]);
            }else {
                $this->urlParamentro = null;
            }
            /*
            echo "<br />Controller: {$this->urlController}";
            echo "<br />Método: {$this->urlMetodo}";
            echo "<br />Parametro: {$this->urlParamentro}";
            */
        }else{ // else para o caso de acessar diretamente a raiz do projeto
            // coloca como padrão o controller controle-login que foi definido em "Config.php"
            $this->urlController = $this->slugController(CONTROLER);
            // coloca como padrão o método login que foi definido em "Config.php"
            $this->urlMetodo = $this->slugMetodo(METODO);
        }
    }

    public function limparurl() {
        //Eliminar as tags
        $this->url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->url = trim($this->url);
        //Eliminar a barra no final da url
        $this->url = rtrim($this->url, "/");

        self::$format = array();
        self::$format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        // traduz os caracteres do padrão A para o padrão B
        $this->url = strtr(utf8_decode($this->url), utf8_decode(self::$format['a']), self::$format['b']);
    }

    // método que trata o nome do controller passado na url para o padrao CamelCase. Ex.: ControlleUsuario
    public function slugController($SlugController) {
        // retiro os espaços entre as palavras e acrescento as palavras para o primeiro caracter em maiúsculo
        $urlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugController)))));
        //echo "<br />{$urlController}";
        return $urlController;
    }

    // método que trata o nome do método / parametro passado na url
    public function slugMetodo($SlugMetod) {
        // retiro os espaços entre as palavras e acrescento as palavras para o primeiro caracter em maiúsculo
        $SlugMetodo = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugMetod)))));
        // retorna o nome do método, com o primeiro caracter em minúsculo. Ex.: index
        return lcfirst($SlugMetodo);
    }

    public function carregar() {
        //Verifica se a classe que está na urlController existe
        echo "Classe a ser carregada: {$this->urlController}";
        if (class_exists($this->urlController)) {
            try {
                // chamo o método login, que vai verificar a sessao está aberta
                $this->login();
                // peço para carregar o método
                $this->carregarMetodo();
            } catch (Exception $e) {
                $this->urlController = $this->slugController(CONTROLER);
                $this->urlMetodo = $this->slugMetodo(METODO);
                $this->carregar();
            }
        }else {
            $this->urlController = $this->slugController(CONTROLER);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->carregar();
        }
    }

    public function carregarMetodo() {
        // pego a classe que será carregada
        $classeCarregar = new $this->urlController();
        //Verifico se existe o método dentro da classe
        if (method_exists($classeCarregar, $this->urlMetodo)) {
            if ($this->urlParamentro !== null) {
                // chamo a classe e passo o parâmetro, pois ele existe
                $classeCarregar->{$this->urlMetodo}($this->urlParamentro);
            } else {
                // chamo a classe e sem o parâmetro, pois ele não existe
                $classeCarregar->{$this->urlMetodo}();
            }
        }else { // se não existir o método, pega-se o controller e o método padrão do "Config.php"
            $this->urlController = $this->slugController(CONTROLER);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->carregarMetodo();
        }
    }

    private function login() {
        // verifico se existe uma sessão aberta para o "id" do usuario
        if (!isset($_SESSION['id'])) {
            // se o controller for ControleLogin e método Login ou se o usuário não tiver escolhido nenhum controller e nem método
            if ((($this->urlController == 'ControleLogin') & ($this->urlMetodo == 'login')) || (($this->urlController == '') & ($this->urlMetodo == ''))) {
                $this->urlController = 'ControleLogin';
                $this->urlMetodo = 'login';
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário realizar o login para acessar a página.</div>";
                $this->urlController = 'ControleLogin';
                $this->urlMetodo = 'login';
            }
        }
    }

}
