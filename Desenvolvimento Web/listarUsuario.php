<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>:: Listando os Usuários</title>
  </head>
  <body>
    <?php
      include_once ("conn/conexao.php");

      $status = array("Inativo", "Ativo");

      $query = "SELECT * FROM `ifes`.`usuario` WHERE `status` = 1";
      $queryExec = mysqli_query($con, $query) or die ("Erro: " .mysqli_error($con));

      while ($linha = mysqli_fetch_object($queryExec)) {
        echo "Nome: " .$linha->nome;
        echo "<br />";
        echo "Login: " .$linha->login;
        echo "<br />";
        echo "Status: " .$status[$linha->status]; ?>
        <br />

        <a href="upUsuario.php?id=<?php echo $linha->idUsuario; ?>"> Alterar Usuário</a> |
        <a href="delUsuario.php?id=<?php echo $linha->idUsuario; ?> &sit=<?php echo $linha->status; ?>" > Alterar Status</a>
        <form name="form1" action="delUsuario2.php" method="post">
          <input name="id" type="hidden" value="<?php echo $linha->idUsuario; ?>"/>
          <input name="apagar" value="Deletar Usuário" type="submit" />
        </form>
        <br /> <br /> <br />

        <?php

      }

    ?>
  </body>
</html>
