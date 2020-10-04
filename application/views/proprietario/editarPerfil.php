<?php ?>

<br>
<br>

<div class="container col-md-8">
    <h3> Editar Perfil </h3>
    <hr>

    <form action="<?php echo base_url().'Main/editarPerfil'; ?>" method="POST" >
        <div class="row">
            <div class='col-md-12'>
                <div class="form-group">
                    <b> <label>Nome</label> </b>
                    <input value="<?php echo $nome; ?>" type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <b> <label>Telefone</label> </b>
                    <input value="<?php echo $telefone; ?>" type="text" class="form-control" id="telefone" name="telefone" required>
                </div>

                <div class="alert bg-warning">
                    O seu e-mail serve de base para a conta, portanto, ele não
                    pode ser alterado.
                </div>    
            </div>
        </div>  

        <div class="row m-2">
            <div class="float-left form-group col-md-2">
                <?php echo anchor('Main/mostrarMeuPerfil/', 'Voltar', array('class' => 'btn btn-danger btn-lg'));
                ?>
            </div>

            <div class="col-md-7"></div>

            <div class="float-right form-group col-md-3">
                <input type="submit" class="btn btn-success btn-lg" value="Salvar Alterações">
            </div>
        </div>


    </form>

    <br>
    <br>

</div>
