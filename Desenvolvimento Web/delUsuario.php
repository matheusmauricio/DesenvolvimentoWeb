<?php


  include_once ("conn/conexao.php");

  if ($_GET) {
    $id = $_GET['id'];

    $query = "UPDATE `ifes`.`usuario` SET `status` = '0' WHERE `usuario`.`idUsuario` = '$id'";

    $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));
    header("location: listarUsuario.php");


  }


?>
