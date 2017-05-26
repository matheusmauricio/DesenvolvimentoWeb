<?php


  include_once ("conn/conexao.php");

  if ($_POST) {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);


    $query = "INSERT INTO `ifes`.`usuario` VALUES('', '$nome', '$login', '$senha', '1')";
    $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));
    header("location: listarUsuario.php");


  }


?>
