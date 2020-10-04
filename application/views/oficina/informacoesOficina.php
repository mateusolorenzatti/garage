<?php ?>

<br>
<br>

<div class="container col-md-8">
    <div class="card rounded-0 border-dark row border-top-0 border-right-0">
        <div class="bg-dark col-md-8 text-white p-3">
            <h3>  <?php echo $nome; ?> </h3>
        </div>
    </div>

    <br>

    <div class="row ">
        <div class='col-md-2 bg-dark'>


        </div>
        <div class='col-md-6 lead'>
            <br>

            <p> <b> Endereço: </b> <?php echo $endereco; ?> </p>

            <p> <b> E-mail: </b> <?php echo $email; ?> </p>

            <p> <b> Cidade: </b> <?php echo $cidadeNome; ?> </p>

            <p> <b> Telefones:  </b> <br>
                <?php
                foreach ($telefones as $fone) {
                    echo $fone['telefone'] . "<br> ";
                }
                ?>
            <p>

        </div>

        <div class='col-md-4 h-100'>
 <!--The div element for the map -->
    <blockquote class="embedly-card"><h4><a href="https://goo.gl/maps/8ShvRsKkLMsNVJcC6">Stilo Car</a></h4><p>Find local businesses, view maps and get driving directions in Google Maps.</p></blockquote>
<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
        </div>
    </div> 

    <br>

    <?php echo anchor('Main/voltarOficinaInfo/' . $cidade, 'Voltar', array('class' => 'btn btn-dark'));
    ?>

    <br>
    <br>

</div>



