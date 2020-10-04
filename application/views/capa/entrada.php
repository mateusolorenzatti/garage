<?php ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top pl-5 pr-5">
    <a class="navbar-brand" href="index">
        <img src="<?php echo base_url(); ?>imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        SmartFix™ 
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php echo anchor('Main/selecaoDeCidade', 'Oficinas na minha cidade', array('class' => 'btn text-white'));
                ?>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Entrar como oficina </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Detalhes</a>
                    <a class="dropdown-item" href="#">Cadastro</a>
                    <a class="dropdown-item" href="#">Capacitação e Fornecimento do Software</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <?php echo anchor('Main/abrirCadastroeLogin', 'Login/Cadastro', array('class' => 'btn text-white'));
            ?>
        </form>
    </div>
</nav>

<br>
<br>

<main role="main" class="container">
    <br>
    <br>

    <div class="bg-danger text-white p-3 m-2">

        <h1>Está cansado(a) de esperar o seu carro no reparo?</h1>
        <p class="lead">
            Com o <b> SmartFix </b> você sabe como está o progresso do reparo de seu veículo em tempo real 
            e sabe quando ele estará te esperando!
        </p>

    </div>

    <div class="p-4">
        <img src="<?php echo base_url(); ?>imagens/entrada/reparo.png" class="img-fluid" alt="Responsive image">
    </div> 

    <div class='row text-white p-2'>

        <div class="col-md-6 pr-2">
            <div class="col-md-12 bg-primary p-3 ">
                <h1>Facilidade e praticidade na inserção de dados</h1>
                <p class="lead">
                    A ferramenta fornecida para as oficinas para marcar o procresso do reparo 
                    são plataformas embarcadas, que são páticas e oferecem infinitas possibilidades
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 bg-primary p-3 h-100" >
                <h1>Deixe sua oficina mais visível! </h1>
                <p class="lead">
                    Além de auxiliar na organização de tarefas a serem feitas, nosso serviço 
                    possibilita uma visibilidade maior da oficina.
                </p>
            </div>
        </div>

    </div>

    <br>
    <br>
</main>


    <nav class="navbar text-white bg-dark conteiner">
        <p class='mx-auto'> Desenvolvido por Nelson de Almeida - IFRS Campus Farroupilha. Framework CSS: Bootstrap
        </p>
    </nav>

<!--<nav class="navbar text-white bg-dark conteiner ">
    <p class='mx-auto'> Desenvolvido por Nelson de Almeida - IFRS Campus Farroupilha. Framework CSS: Bootstrap
    </p>
</nav>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
