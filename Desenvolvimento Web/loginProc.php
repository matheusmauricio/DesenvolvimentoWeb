<?php


  include_once ("conn/conexao.php");

  if ($_POST) {
    if ($_POST['login']) {
      $login = mysqli_real_escape_string ($con, $_POST['login']);
    }

    if ($_POST['senha']) {
      $senha = md5($_POST['senha']);
    }

    $query = "SELECT * FROM `ifes`.`usuario` WHERE `usuario`.`login` = '$login' AND `usuario`.`senha` = '$senha'";

    $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));

    if(mysqli_num_rows($queryExec) == 1){
      echo "Login Permitido";
      header("location: listarUsuario.php");
    } else{
      echo "Login Proibido!! (HA HA)";
    }





  }


?>
