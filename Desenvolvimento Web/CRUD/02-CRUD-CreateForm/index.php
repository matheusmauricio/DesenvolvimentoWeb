<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DW | CREATE</title>
  </head>
  <body>

    <?php
      require("./_inc/Config.inc.php");

      //converte todo o POST para String
      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      if(!empty($dados['btnCadUsuario'])){
        //apaguei o conteúdo do botão, que não será inserido no banco de dados
        unset($dados['btnCadUsuario']);
        $cadUsuario = new Usuario();
        $cadUsuario->ExeCreate($dados);
        echo $cadUsuario->getMsg();
      }

      /*$cadUsuario = new Create();
      $dados = array('nome' => 'Matheus', 'email' => 'matheus_mauricio@hotmail.com');
      $cadUsuario->ExeCreate('users', $dados);

      var_dump($cadUsuario);*/
    ?>

    <form name="cadUsuario" action="" method="post" enctype="multipart/form-data">
      <p>
        <label>Nome: </label>
        <input type="text" name="nome" value="<?php if(isset($dados['nome'])){echo $dados['nome'];} ?>" placeholder="Preencher o nome..." required/>
      </p>
      <p>
        <label>E-mail: </label>
        <input type="email" name="email" value="<?php if(isset($dados['email'])){echo $dados['email'];} ?>" placeholder="Preencher o e-mail..." required/>
      </p>
      <p>
        <label>Senha: </label>
        <input type="password" name="password" value="" required/>
      </p>
      <p>
        <input type="submit" name="btnCadUsuario" value="Gravar">
      </p>
    </form>

  </body>
</html>
