<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-expand-md navbar-dark bg-danger fixed-top pl-5 pr-5">
    <a class="navbar-brand mr-3" href="abrirHome">
        <img src="<?php echo base_url(); ?>imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        SmartFix™ 
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-right" id="navbarsExampleDefault">

        <ul class="navbar-item navbar-nav">
             <a class="btn btn-danger navbar-link" href="selecaoDeCidade"> 
                 <i class="material-icons align-top">directions</i>
                 Oficinas por perto
             </a>
        </ul>

        <ul class="navbar-item navbar-nav mr-auto">
             <a class="btn btn-danger navbar-link" href="mostrarHistorico"> 
                 <i class="material-icons align-top">history</i>
                 Histórico de serviços
             </a>
        </ul>

        <div class="navbar-item navbar-nav dropdown mr-4">
            <button class="btn btn-danger dropdown-toggle ml-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons align-top mr-2">person</i>
                <?php echo " ".$this->session->userdata('nome'); ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                             <a class="dropdown-item" href="mostrarMeuPerfil"> 
                                 <i class="material-icons align-top mr-2">person</i> 
                                 Meu Perfil 
                             </a>
                       
                             <a class="dropdown-item" href="abrirHome"> 
                                 <i class="material-icons align-top mr-2">home</i>  
                                 Ir para a Home
                             </a> 
                        
                             <a class="dropdown-item" href="logout"> 
                                 <i class="material-icons align-top mr-2">exit_to_app</i> 
                                 Sair
                             </a>
                     
            </div>
        </div>
    </div>
</nav>

<br>
<br>