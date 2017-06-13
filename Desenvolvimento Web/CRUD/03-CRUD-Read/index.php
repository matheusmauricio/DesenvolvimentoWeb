<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DW | CREATE</title>
  </head>
  <body>

    <?php
      require("./_inc/Config.inc.php");

      $lerUsuario = new Read();
      //$lerUsuario->ExeRead('users');
      $lerUsuario->ExeRead('users', 'WHERE id < :id ORDER BY id ASC', 'id=10 ');
      //var_dump($lerUsuario);

      foreach ($lerUsuario->getResultado() as $key=>$value) {
        echo "ID: {$value['id']} <br />";
        echo "Nome: {$value['nome']} <br />";
        echo "E-mail: {$value['email']} <br /><hr />";
      }
    ?>

  </body>
</html>
