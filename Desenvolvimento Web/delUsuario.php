<?php


  include_once ("conn/conexao.php");

  if ($_GET) {
    $id = $_GET['id'];
    $status = $_GET['sit'];


    if($status == 0){
      $status = 1;
    } else{
      $status = 0;
    }


    $query = "UPDATE `ifes`.`usuario` SET `status` = '$status' WHERE `usuario`.`idUsuario` = '$id'";

    $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));
    header("location: listarUsuario.php");


  }


?>
