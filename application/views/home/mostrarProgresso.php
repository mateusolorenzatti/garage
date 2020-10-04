<?php ?>

<div class="col-md-12">
    <?php
    foreach ($serviços as $atual) {
        ?>
        <div class="card border border-success rounded-0">
            <div class="card-header bg-success text-white rounded-0">
                <h5 class="float-left mb-2"> <?php echo $atual['marca'] . " " . $atual['modelo'] . ": " . $atual['placa']; ?> </h5>
                <div class="float-right">
                    <a class="btn btn-success btn-sm" href="informacoesServiço/<?php echo $atual['idServiço']; ?>">  Informações do serviço </a>
                </div>
            </div>
            <div class="row card-block p-2">
                <div class="col-md-3 float-left">
                    <img src="<?php
                    echo base_url() . "imagens/home";
                    switch ($atual['status']) {
                        case "Em análise":
                            echo "/carro_análise.png";
                            break;

                        case "Em andamento":
                            echo '/carro_reparo.png';
                            break;

                        case "Aguardando":
                            echo '/carro_aguardando.png';
                            break;

                        default:
                            break;
                    }
                    ?>" 
                         width="100%" height="100%" class="d-inline-block align-top" alt="">
                </div>
                <div class="col-md-9 float-left">

                    <?php
                    switch ($atual['status']) {
                        case "Em análise":
                            ?>
                            <div class="col-md-12 py-4">
                                <h5 class='text-center text-secondary'> 
                                    O veículo está em análise. Em breve você<br>
                                    poderá ver o progresso do reparo aqui. 
                                </h5>
                            </div>

                            <?php
                            break;

                        case "Em andamento":
                            ?>

                            <div class="col-md-12 h-75 py-4">
                                <div class="h-100">
                                    <div class="card border border-dark rounded-0 h-100">
                                        <div class="bg-success h-100" style="width: <?php echo $atual['porcentagem']; ?>%;">
                                            <!--Esta é a barra!!-->
                                        </div>
                                    </div>
                                    <div class="float-right row px-3">
                                        Progresso: <?php echo $atual['quantItensConcluidos'] . "/" . $atual['quantItens']; ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                            break;

                        case "Aguardando":
                            ?>

                            <div class="col-md-12 py-4">
                                <h5 class='text-center text-secondary'> 
                                    O veículo já está pronto! <br>
                                    Se necessário, veja as informações da oficina <br> 
                                    abaixo para saber como chegar lá. 
                                </h5>
                            </div>

                            <?php
                            break;

                        default:
                            break;
                    }
                    ?>

                </div>
            </div>
            <div class="card-footer text-white bg-success rounded-0">
                <div class="row float-right">
                    <p> o seu veículo está em </p>
                    <a class="mx-2 float-right text-white" href="informacoesOficina/<?php echo $atual['oficina']; ?>">
                        <?php echo $atual['nomeOficina']; ?>
                    </a>
                </div>
            </div>

        </div>
        <br>
        <?php
    }
    ?>
        </div>
</div>