<?php


  include_once ("conn/conexao.php");

  if ($_POST) {
    $id = $_POST['id'];


    $query = "DELETE FROM `ifes`.`usuario` WHERE `usuario`.`idUsuario` = '$id'";

    $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));
    header("location: listarUsuario.php");


  }


?>
