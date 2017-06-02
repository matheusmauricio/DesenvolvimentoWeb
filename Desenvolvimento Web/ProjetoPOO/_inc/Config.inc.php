<?php

//serve para importar as classes

  function __autoload($class){
    $dirName = "_class";

    if(file_exists("{$dirName}/{$class}.class.php")){
      require("{$dirName}/{$class}.class.php");
    } else{
      die ("Desculpe, a classe {$class} não foi encontrada!");
    }
  }

?>
