<div class="well">

    <div class="page-header">
        <h1>Listar usuários</h1>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if (isset($_SESSION['msgcad'])) {
        echo $_SESSION['msgcad'];
        unset($_SESSION['msgcad']);
    }
    
    $paginacao = $this->dados[1];
    $this->dados = $this->dados[0];
    ?>

    <div class="pull-right">
        <a href="<?php echo URL; ?>controle-usuario/cadastrar"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a>
    </div>

    <?php
    if (!empty($this->dados)) {
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="hidden-xs">E-mail</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($this->dados as $user) {
                extract($user);
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nome; ?></td>
                    <td class="hidden-xs"><?php echo $email; ?></td>
                    <td>
                        <a href="<?php echo URL; ?>controle-usuario/visualizar/<?php echo $id; ?>">
                            <button type="button" class="btn btn-primary">Visualizar</button>
                        </a>

                        <a href="<?php echo URL; ?>controle-usuario/Editar/<?php echo $id; ?>">
                            <button type="button" class="btn btn-warning">Editar</button>
                        </a>

                        <a href="<?php echo URL; ?>controle-usuario/apagar/<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger">Apagar</button>
                        </a>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    echo $paginacao;
    ?>
</div>

