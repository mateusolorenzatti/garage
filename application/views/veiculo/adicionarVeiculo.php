<?php ?>
<br>


<div class="container col-md-8">
    <h3> Novo veículo </h3>
    <hr>

    <form action="<?php echo base_url() . 'Main/adicionarVeiculo'; ?>" method="POST" >
        <div class="row">
            <div class='col-md-6'>
                <div class="form-group">
                    <b> <label>Marca</label> </b>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>

                <div class="form-group">
                    <b> <label>Modelo</label> </b>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>

                <div class="form-group">
                    <b> <label>Placa</label> </b>
                    <input type="text" class="form-control" id="placa" name="placa" placeholder="XXX-0000" required>
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group">
                    <b> <label>Renavam</label> </b>
                    <input type="text" class="form-control" id="renavam" name="renavam" required>
                </div>

                <div class="form-group">
                    <b> <label>Ano</label> </b>
                    <input type="number" class="form-control" id="ano" name="ano" required>
                </div>

                <div class="form-group">
                    <b> <label>Cor</label> </b>
                    <input type="text" class="form-control" id="cor" name="cor" required>
                </div>
            </div>
            
        </div>

        <div class="row m-2">
            <div class="float-left form-group col-md-2">
                <?php echo anchor('Main/abrirHome', 'Voltar', array('class' => 'btn btn-danger btn-lg'));
                ?>
            </div>
            
            <div class="col-md-8"></div>
            
            <div class="float-right form-group col-md-2">
                <input type="submit" class="btn btn-success btn-lg" value="Registrar">
            </div>
        </div>


    </form>

    <br>
    <br>
    
</div>
