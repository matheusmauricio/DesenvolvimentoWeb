<?php
session_start();
define('URL', 'http://127.0.0.1/backup/DesenvolvimentoWeb/CRUD/login-paginacao/adm/');

define('CONTROLER', 'controle-login');
define('METODO', 'login');

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'ifesteste');

function __autoload($Class) {
    $dirName = array(
        'controllers',
        'models',
        'models/helper',
        'views',
        'config'
    );
    foreach ($dirName as $diretorios) {
        if (file_exists("{$diretorios}/{$Class}.php")) {
            require("{$diretorios}/{$Class}.php");
        }
    }
}
