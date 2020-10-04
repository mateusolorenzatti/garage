<?php
?>

<div>
 <div class="card text-center">
  <div class="card-header">
    <h2 class='text-danger'> Um erro ocorreu! Tente mais tarde. </h2>
  </div>
  <div class="card-block">
    <p class='text-danger'> Verifique sua conexão ou se algo mais esteja impedindo a
    sua navegação.    
    </p>
    
    <br>
    
    <?php
     echo anchor('ConferenciasCO/abrirHome/', 'Voltar para a Home', array('class' => 'btn btn-danger float-right'));
    ?>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>
</div>


