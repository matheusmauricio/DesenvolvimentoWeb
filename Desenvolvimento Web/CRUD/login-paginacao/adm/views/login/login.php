<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DW - Área Administrativa</title>
        <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/css/signin.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form method="POST" action="" class="form-signin">
                <h2 class="form-signin-heading text-center">Área Administrativa</h2>

                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

                <div style="padding-bottom: 20px;">
                    <label class="sr-only">Usuário: </label>
                    <input type="text" class="form-control" name="email" placeholder="Digite seu email">
                </div>

                <div style="padding-bottom: 20px;">
                    <label class="sr-only">Senha: </label>
                    <input type="password" class="form-control" name="password" placeholder="Digite sua senha">
                </div>

                <input type="submit" class="btn btn-lg btn-danger btn-block" value="Acessar" name="SendLogin">    
            </form>
        </div>
    </body>
</html>