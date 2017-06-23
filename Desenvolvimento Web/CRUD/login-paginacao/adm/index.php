<?php
//echo "teste";
require './config/Config.php';
// instancio e configuro as informações iniciais do controller
$url = new ConfigController();
// chamo o método para carregar o controller e o método informado, juntamente com o parâmetro
$url->carregar();
