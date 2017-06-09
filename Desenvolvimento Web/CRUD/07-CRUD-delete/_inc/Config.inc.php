<?php

//Dados para ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'ifesTeste');

function __autoload($Class){
    $dirName = '_class';
    
    if (file_exists("{$dirName}/{$Class}.class.php")) {
        require("{$dirName}/{$Class}.class.php");
    }else {
        die("Classe {$Class}.class.php não encontrada");
    }
}

