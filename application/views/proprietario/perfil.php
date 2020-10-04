<?php ?>
<br>
<br>

<div class="container col-md-8">

    <div class="card rounded-0 border-danger"> 
        <div class="row col-md-12">
            <div class="col-md-4 bg-danger text-white p-3">
                <h4 class=''> <?php echo $nome; ?> </h4>
            </div>
            <div class='col-md-8 p-2'>
                <br>

                <h5> <b> email: </b>  <?php echo $email; ?> </h5>

                <h5> <b> Telefone: </b> <?php echo $telefone; ?> </h5>

                <br>

                <p> Quantidade de veículos cadastrados: <?php echo $quantVeiculos; ?> </p>

                <p> Quantidade total de serviços prestados: <?php echo $quantServiços; ?> </p>

                <br>
            </div>

        </div> 
    </div>
    <br>
    <div class='col-md-12 '>
        <?php echo anchor('Main/abrirHome', 'Voltar para a home', array('class' => 'btn btn-danger float-left'));
        ?>          
        <?php echo anchor('Main/abrirEditarPerfil', 'Editar', array('class' => 'btn btn-danger float-right'));
        ?>
    </div>
</div>
</div>


