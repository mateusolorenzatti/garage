<?php ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-dark bg-primary fixed-top pl-5 pr-5">
    <a class="navbar-brand" href="index">
        <img src="<?php echo base_url(); ?>imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        SmartFix™ 
    </a>
    <ul class="nav navbar-nav navbar-right">
        <?php echo anchor('Main/index', 'Voltar', array('class' => 'btn text-white'));
        ?>
    </ul>

</nav>

<br>
<br>

<main class="container">
    <br>
    <br>

    <div class='row'> 
        <!------- Div para login --------->

        <div class="col-md-6">
            <h3> Login </h3>
            <hr>

            <div class='container col-md-8'>
                <form method="post" 
                      action="<?php echo base_url() . 'Main/verificaLogin'; ?>" >

                    <b> <label for="inputEmail3" class="col-md-12 col-md-12">Email</label> </b>
                    <div class="col-md-12 col-md-12 control-label">
                        <input type="email" class="form-control col-md-12" id="campoEmail"
                               name="email" placeholder="contato@exemplo.com" required>
                    </div>

                    <br>

                    <b> <label for="inputPassword3" class="col-md-12 col-md-12">Senha</label> </b>
                    <div class="col-md-12 col-md-12 control-label">
                        <input type="password" class="form-control col-md-12" id="campoSenha"
                               name="senha" required>
                    </div>
                    <br>

                    <?php echo anchor('Main/esqueciSenha', 'Esqueci a minha senha', array('class' => 'float-right'));
                    ?>
                    <br> 
                    <br>

                    <div class="col-md-2 float-left">
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </div>
                </form>
            </div>
        </div>

        <!------- Div para cadastro --------->

        <div class="col-md-6">
            <h3> Cadastro </h3>
            <hr>

            <form action="<?php echo base_url() . 'Main/registrarProprietario'; ?>" method="POST" >
                <div class="form-group">
                    <b> <label for="username">Nome</label> </b>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome" required>

                </div>
                <div class="form-group">
                    <b> <label for="email">Email</label> </b>
                    <input type="email" class="form-control" id="email" name="email" placeholder="contato@exemplo.com" required>

                </div>
                <div class="form-group">
                    <b> <label for="password">Senha</label> </b>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <b> <label for="instituicao">Telefone</label> </b>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(99) 99999-9999" required>


                </div>  

                <div class="col-md-12 row">
                    <div class="col-md-2 form-group float-right">
                        <input type="submit" class="btn btn-success" value="Registrar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

