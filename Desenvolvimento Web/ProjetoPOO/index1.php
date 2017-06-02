<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>:: Utilizando PHPOO ::</title>
  </head>
  <body>

    <?php
      /*require("./_class/Cliente.class.php");
      require("./_class/Usuario.class.php");
      require("./_class/Produto.class.php");
      */
      require("./_inc/Config.inc.php");


      $cliente = new Cliente("Maria do Rosário", 55);
      echo $cliente->verCliente();
      echo "<hr />";
      $cliente->setNome("Maria do Rosário Bolsonaro");
      echo $cliente->verCliente();

      echo "<hr />";
      $produto = new Produto(10.00, "Batata Frita");
      echo $produto->verProduto();

      echo "<hr />";
      $usuario = new Usuario("Mm", "Quebrada");
      echo $usuario->verUsuario();

      echo "<hr />";
      $cliente2 = clone $cliente;
      $cliente2->setNome("Maria do Rosário Bolsonaro Gentili");
      echo $cliente2->verCliente();
    ?>

  </body>
</html>
