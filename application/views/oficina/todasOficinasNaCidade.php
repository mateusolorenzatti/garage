<?php ?>
<br>
<br>

<div class='container'>
    <h4 class="float-right">  <i class="material-icons">search</i> Todas oficinas em <?php echo $cidade->nome . ", " . $cidade->estado; ?></h4>

    <br>
    <hr>

    <div class="row m-2">
        <div class="float-left form-group col-md-2">
            <?php echo anchor('Main/selecaoDeCidade', 'Consultar novamente', array('class' => 'btn btn-dark '));
            ?>
        </div>

        <div class="col-md-8"></div>

        <div class="float-right form-group col-md-2">
            <?php echo anchor('Main/telaInicialOficinas', 'Home/Tela Inicial', array('class' => 'btn btn-dark'));
            ?>
        </div>
    </div>


    <div class="container col-md-10">
        <?php if (empty($oficinas)) { ?>
            <h5 class='text-center text-secondary'> Não existem oficinas cadastradas nesta cidade. </h5>

            <br>
            <?php
        } else {
            foreach ($oficinas as $atual) {
                ?>
                <div class="card border border-dark rounded-0">
                    <div class="card-header rounded-0 bg-dark"> 
                        <h5 class="text-white"> <b> <?php echo $atual['nome']; ?> </b> </h5>
                    </div>
                    <div class="row card-block p-2">
                        <div class="col-md-3 float-left">
                            <img src="<?php echo base_url(); ?>imagens/home/oficina.png" 
                                 width="100%" height="100%" class="d-inline-block align-top" alt="">
                        </div>
                        <div class="col-md-6">
                            <br>
                            
                            <p> <b> Endereço: </b> <?php echo $atual['endereco']; ?> </p>

                            <p> <b> email: </b> <?php echo $atual['email']; ?> </p>
                        </div>
                        <div class="col-md-3 float-right">
                            <a class="btn btn-dark float-right" href="informacoesOficina/<?php echo $atual['idOficina']; ?>"> Mais Informações </a>
                        </div>
                    </div>

                </div>
            <br>

                <?php
            }
        }
        ?>

        <br>   

    </div> 



</div>


