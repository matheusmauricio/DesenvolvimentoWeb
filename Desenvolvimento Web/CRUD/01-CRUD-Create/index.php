<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DW | CREATE</title>
  </head>
  <body>

    <?php
      require("./_inc/Config.inc.php");

      $cadUsuario = new Create();
      $dados = array('nome' => 'Matheus', 'email' => 'matheus_mauricio@hotmail.com');
      $cadUsuario->ExeCreate('users', $dados);

      var_dump($cadUsuario);
    ?>

  </body>
</html>
