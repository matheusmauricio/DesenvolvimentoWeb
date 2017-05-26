<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>:: Alterando Usuários ::</title>
  </head>
  <body>

    <?php

      include_once("conn/conexao.php");
      if(isset($_GET['id'])){
          $id = $_GET['id'];
          $query = "SELECT * FROM `ifes`.`usuario` WHERE `idUsuario` = '$id'";

          $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));

          $linha = mysqli_fetch_row($queryExec);


    ?>

    <form name="form1" method="post" action="upUsuarioProc.php">

      <input name="id" type="hidden" value="<?php echo $id; ?>" />
      <p> Nome: <input name="nome" type="text" value="<?php echo $linha[1]; ?>" /> </p>
      <p> Login: <input name="login" type="text" value="<?php echo $linha[2]; ?>" /> </p>
      <p> Senha: <input name="senha" type="password" value="" /> </p>
      <p> Status: <select name="status">
        <option value="0" <?php  if($linha[4] == 0) {echo "selected";} ?>>Inativo</option>
        <option value="1" <?php  if($linha[4] == 1) {echo "selected";} ?>>Ativo</option>
      </select></p>
      <input name="enviar" value="Gravar" type="submit" />
    </form>
    <?php
      }
    ?>
  </body>
</html>
