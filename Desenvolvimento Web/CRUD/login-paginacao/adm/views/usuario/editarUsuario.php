<div class="well">
    <div class="page-header">
        <h1>Editar usuário</h1>
    </div>
    <H1></H1>
    <?php
    if (isset($this->dados[0]['msg'])) {
        echo $this->dados[0]['msg'];
    } elseif (isset($this->dados['msg'])) {
        echo $this->dados['msg'];
    }
    ?>
    <form name="CadUsuario"  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome" placeholder="Nome completo" value="<?php
                if (isset($this->dados[0]['nome'])) {
                    echo $this->dados[0]['nome'];
                } else if (isset($this->dados['nome'])) {
                    echo $this->oados['nome'];
                }
                ?>">
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-2 control-label">E-mail:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Seu melhor e-mail" value="<?php
                if (isset($this->dados[0]['email'])) {
                    echo $this->dados[0]['email'];
                } else if (isset($this->dados['email'])) {
                    echo $this->dados['email'];
                }
                ?>">
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-2 control-label">Senha:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="Senha">

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-warning" value="Editar" name="SendEditUsuario">
            </div>
        </div>
    </form>
</div>