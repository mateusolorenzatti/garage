<?php ?>

<br>
<br>

<div class="container col-md-8">
    <div class="card rounded-0 border-primary row border-top-0 border-right-0">
        <div class="bg-primary col-md-7 text-white p-2">
            <h3> <b> <?php echo $marca . " " . $modelo ?> </b>
            </h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 bg-primary"></div>
        <div class='col-md-6 lead'>
            <br>

            <p> <b> Placa: </b> <?php echo $placa; ?> </p>

            <p> <b> RENAVAM: </b> <?php echo $renavam; ?> </p>

            <p> <b> Ano: </b> <?php echo $ano; ?> </p>

            <p> <b> Cor: </b> <?php echo $cor; ?> </p>


            <br>

        </div>

        <div class='col-md-3'>
            <br>            
            <?php echo anchor('Main/abrirEditarVeiculo/' . $idVeiculo, 'Editar', array('class' => 'btn btn-success w-100 '));
            ?>
            <br>
            <br>
            <?php echo anchor('Main/excluirVeiculo/' . $idVeiculo, 'Excluir', array('class' => 'btn btn-danger w-100 '));
            ?>
            <br>
            <br>

        </div>
    </div> 
    
    <br>

    <?php echo anchor('Main/abrirHome', 'Voltar', array('class' => 'btn btn-primary'));
    ?>


</div>


