<?php ?>

<div class="col-md-3 float-right border border-primary border-top-0 border-right-0 border-bottom-0 p-0 mt-2">
    
    <div class="card rounded-0 border-primary border-top-0 border-right-0">
        <div class="col-md-12 row">
            <div class="bg-primary col-md-10 text-white">
                <h3> Meus Veículos </h3>
            </div>
            <!--            --> 
        </div>
    </div>
    <br>

    <div class="col-md-12">
        <?php if (empty($veiculos)) { ?>
            <h5 class='text-center text-secondary'> Você não tem veículos cadastrados </h5>

            <br>
            <?php
        } else {
            foreach ($veiculos as $atual) {
                ?>

                <div class="">
                    <a class="btn btn-primary w-100 rounded-0" href="informacoesVeiculo/<?php echo $atual['idVeiculo']; ?>"> <?php echo $atual['marca']." ".$atual['placa']." ".$atual['placa']; ?> </a>
                </div>


                <?php
            }
        }
        ?>
            <br>
        <a class="btn btn-primary w-100 rounded-6 float-right" title="Adicionar um veículo" href="abrirAdicionarVeiculo"> 
            <i class="material-icons align-top">add</i>
        </a>


    </div> 
</div>