<?php


  include_once ("conn/conexao.php");

  if ($_POST) {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $status = $_POST['status'];
    $id = $_POST['id'];

    $query = "UPDATE `ifes`.`usuario` SET
                      `nome` = '$nome',
                      `login` = '$login',
                      `senha` = '$senha',
                      `status` = '$status'
                       WHERE `usuario`.`idUsuario` = '$id'";

    $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));
    header("location: listarUsuario.php");


  }


?>
