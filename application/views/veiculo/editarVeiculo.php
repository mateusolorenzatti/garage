<?php
?>
<br>
<br>

<div class="container col-md-8">
    <h3> Editar Veículo </h3>
    <hr>

    <form action="<?php echo base_url() . 'Main/editarVeiculo'; ?>" method="POST" >
        <div class="row">
            <div class='col-md-6'>
                <input type="hidden" name="idVeiculo" id="idVeiculo" value="<?php echo $idVeiculo; ?>">
                
                <div class="form-group">
                    <b> <label>Marca</label> </b>
                    <input value="<?php echo $marca; ?>" type="text" class="form-control" id="marca" name="marca" required>
                </div>

                <div class="form-group">
                    <b> <label>Modelo</label> </b>
                    <input value="<?php echo $modelo; ?>" type="text" class="form-control" id="modelo" name="modelo" required>
                </div>

                <div class="form-group">
                    <b> <label>Placa</label> </b>
                    <input value="<?php echo $placa; ?>" type="text" class="form-control" id="placa" name="placa" placeholder="XXX-0000" required>
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group">
                    <b> <label>Renavam</label> </b>
                    <input value="<?php echo $renavam; ?>" type="text" class="form-control" id="renavam" name="renavam" required>
                </div>

                <div class="form-group">
                    <b> <label>Ano</label> </b>
                    <input value="<?php echo $ano; ?>" type="number" class="form-control" id="ano" name="ano" required>
                </div>

                <div class="form-group">
                    <b> <label>Cor</label> </b>
                    <input value="<?php echo $cor; ?>" type="text" class="form-control" id="cor" name="cor" required>
                </div>
            </div>
            
        </div>

        <div class="row m-2">
            <div class="float-left form-group col-md-2">
                <?php echo anchor('Main/informacoesVeiculo/'.$idVeiculo, 'Voltar', array('class' => 'btn btn-danger btn-lg'));
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
