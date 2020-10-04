<?php ?>

<br>
<br>
<br>

<div class='container col-md-6'>
    <div class="card text-center">
        <div class="card-header ">
            <h2 class='text-danger'> <?php echo $mensagem; ?>  </h2>
        </div>
        <div class="card-block">
            <p class='text-danger'> Por favor, revise seus dados. Se necessário, mude a sua senha
                ou entre em contato com nosso atendimento.    
            </p>

            <br>

            <div class="row m-2">
                <div class="float-left form-group col-md-4">
                    <?php
                    echo anchor('Main/abrirCadastroeLogin', 'Tentar novamente', array('class' => 'btn btn-danger float-right'));
                    ?>
                </div>

                <div class="col-md-4"></div>

                <div class="float-right form-group col-md-4">
                    <?php
                    echo anchor('Main/index', 'Tela inicial', array('class' => 'btn btn-primary float-right'));
                    ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>
</div>