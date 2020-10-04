<?php ?>s

<div class="card text-center">
  <div class="card-header">
     <h2 class='text-danger'> Não foi possível efetuar o cadastro. </h2>
  </div>
  <div class="card-block">
     <p class='text-danger'> O erro possivelmente ocorreu por um conflito dentro do nosso banco de dados.
    Se quiser tentar novamente, certifique-se dos dados.       
    </p>
    
    <br>
    
    <?php
     echo anchor('Main/abrirCadastroeLogin', 'Tentar novamente', array('class' => 'btn btn-danger float-right'));
    ?>
    </div>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>