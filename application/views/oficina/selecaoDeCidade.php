<?php ?>

<br>

<div class='container col-md-6'>
    <div class="card text-center">
        <div class="card-header">
            <h2> Selecione uma cidade para prosseguir </h2>
        </div>
        <div class="card-block">
            <div class='text-info p-2'> Insira no campo abaixo a cidade onde você precisa de serviço.    
                
                <br>
                
                ATENÇÃO: Talvez a cidade onde você vive ou a qual você prucura não está em nosso banco de dados
                por não exitirem oficinas cadastradas.
            </div>

            <br>

            <form method="post" action="<?php echo base_url() . 'Main/mostrarOficinas'; ?>" >

                <select class="custom-select" name="cidade" id="cidade" required>
                    <option selected> Escolha a cidade</option>

                    <?php foreach ($cidades as $cidade) { ?>

                        <option value="<?php echo $cidade['idCidade']; ?>"> 
                            <?php echo $cidade['nome'] . ", " . $cidade['estado']; ?>
                        </option>

                    <?php } ?>
                </select>

                <div class="row m-4">
                    <div class="float-left form-group col-md-2">
                        <?php
                        echo anchor('Main/telaInicialOficinas', 'Voltar', array('class' => 'btn btn-primary float-right'));
                        ?>
                    </div>

                    <div class="col-md-6"></div>

                    <div class="float-right form-group col-md-4">
                        <input type="submit" class="btn btn-success float-right" value="Mostrar oficinas">
                    </div>
                </div>


            </form>    
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>
</div>


