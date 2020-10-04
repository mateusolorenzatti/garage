<?php ?>

<br>
<br>
<br>
<br>


<div class='container col-md-6'>
    <div class="card text-center">
        <div class="card-header">
            <h2 class='text-danger'> Não foi possível editar este veículo. </h2>
        </div>
        <div class="card-block">
            <p class='text-danger'> O erro possivelmente ocorreu por um conflito dentro do nosso banco de dados.
                Se quiser tentar novamente, certifique-se dos dados. (Principalmente de placa e RANAVAM)       
            </p>

            <br>

            <div class="row m-2">
                <div class="float-left form-group col-md-2">
                    <?php echo anchor('Main/abrirEditarVeiculo/'.$idVeiculo, 'Tentar novamente', array('class' => 'btn btn-success'));
                    ?>
                </div>

                <div class="col-md-8"></div>

                <div class="float-right form-group col-md-2">
                    <?php
                    echo anchor('Main/abrirHome', 'Voltar para a Home', array('class' => 'btn btn-primary float-right'));
                    ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>
</div>


