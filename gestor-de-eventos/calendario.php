<!DOCTYPE html>
<HTML lang="pt-br">

<?php

session_start();
if(!isset($_SESSION["user"])){
  header("location:index.php");
}
$nome = $_SESSION["user"];

?>


<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>REINVISIT</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">


    <!--    começam as estilizações CSS-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/edicoes.css">
    <link rel="stylesheet" href="css/edicaolembrete.css">
    <link rel="stylesheet" href="css/navlateral.css">
    <link rel="stylesheet" href="css/diviseventos.css">
    <link rel="stylesheet" href="css/navopacity.css">
    <link rel="stylesheet" href="css/nvmobileresto.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/hover.css">


    <!--    começam os javascripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/funcoes.js"></script>
    <script src="js/jsoneventos.js"></script>
    <script src="js/inserts.js"></script>
    <script src="js/funcoeshtml.js"></script>
    <script src="js/bancodedados.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.1/angular-materialize.min.js"></script>
     <script src="js/selecthome.js"></script>



</head>

<BODY onload="tamanho(); LerLembretes(); Lernavdados(); Lernavdados2();" style="height: 100% !important;">


    <div id="modalembrete" class="modal modal-fixed-footer" style="width: 30% !important; background: #4E5A6B !important;">
        <div class="modal-content" style="color: white !important;">
            <h4>Adicione um lembrete</h4>
            <ul>
                <li class="divider"></li>
            </ul>
            <div class="row" style="margin-top: 5%;">
                <input type="text" placeholder="Nome" name="nomelembrete" id="nomelembrete">
            </div>
            <div class="row">
                <input type="text" placeholder="Assunto" name="assuntolembrete" id="assuntolembrete">
            </div>

            <div class="row">
                <input type="text" placeholder="Data" id="datalembrete" name="datalembrete">
            </div>

        </div>
        <div class="modal-footer" style="background-color: #2C415D !important;">
            <button type="button" class=" waves-effect waves-light btn-flat" style="background: #4E5A6B !important; color: white !important;" name="insert-lembrete" id="insert-lembrete" onclick="insertLembrete();">Adicionar</button>
        </div>

    </div>


    <div class="navbar-fixed-top hide-on-med-and-up">
        <nav>
            <div class="nav-wrapper">
                <div class="container">


                    <a href="#!" class="brand-logo right"><img class="logomobailo show-on-small hide-on-med-large" src="img/logomobile.png"></a>

                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">list</i></a>

                </div>
                          <ul class="sidenav" id="mobile-demo">
                    <li class="espaco"><a href="login.php"> HOME <i class="material-icons left coriconemobile">home</i></a></li>
                    <li class="espaco"><a href="calendario.php">CALENDÁRIO <i class="material-icons left coriconemobile">calendar_today</i></a></li>
                    <li class="espaco"><a href="logineventos.php">EVENTOS <i class="material-icons left coriconemobile ">event</i></a></li>
                    <li class="espaco "><a href="estatisticas.php">ESTATÍSTICAS <i class="material-icons left coriconemobile">sentiment_satisfied_alt</i></a></li>
                    <li class="espaco "> <?php echo '<p class="drop"><a href="logout.php">Sair</a></p>';?> </li>
                </ul>
            </div>
        </nav>

    </div>



    <div class="container-fluid" style=" height: 100%; ">


        <div class="barra hide-on-med-and-down">

            <div class="nav">
                <a href="login.php">
                    <div class="link">HOME <i class="material-icons left">home</i></div>
                </a>
                <a href="calendario.php">
                    <div class="link">CALENDÁRIO <i class="material-icons left">calendar_today</i></div>
                </a>
                <a href="logineventos.php">
                    <div class="link">EVENTOS <i class="material-icons left">event</i></div>
                </a>
                <a href="estatisticas.php">
                    <div class="link">ESTATÍSTICAS <i class="material-icons left">bar_chart</i></div>
                </a>
             

            </div>

        </div>

        <div class="row">

            <div class="col l10 offset-l2 s12">

                <div class="wrapper hide-on-med-and-down">
                       <span style="position:fixed; top: 0;left: 0;width: 100%;height: 8%;padding: 8px 50px;transition: .3s;color: white;background:#3f597c;">
                        
                        <a href="#home" class="brand-logo left logo"><img class="logoimg hide-on-med-and-down" src="img/logo.png"></a>

                        <ul class="uldropdown" style="  float: right;">

                            <li class="nomeuser">
                                <?php echo '<p>'.$_SESSION["user"].'</p>';?>
                            </li>
                            <div class="dropdowndados">
                                <li class="divider"></li>
                                <li id="totaleventosnav"></li>
                                <li class="divider"></li>
                                <li id="totalvisitasnav"></li>
                                <li class="divider"></li>
                                <li style=" border-radius:15px 22px 22px 22px !important;">
                                    <?php echo '<p><a href="logout.php" style="font-size:100% !important; color:white !important;">Sair</a></p>';?>
                                </li>
                            </div>

                        </ul>

                    </span>

                </div>
                <br><br><br><br><br>

                <div class="container">
<br><br><br><br>

<div class="row">
    <div class="col l6 s12 animated fadeInLeft" style="padding-top: 2%;">
        <div style="width: 80%; background:#3f597c; color: white; text-align: center; border-radius: 8px; font-size: 200%; ">
            Aqui você pode adicionar lembretes a seu calendário para manter sua programação sem esquecer de nada!
            
        </div>
    </div><br>
     <div class="col l6 s12 animated fadeInRight" style="padding-top: 2%;">
        <a class=" btn-large  modal-trigger" data-target="modalembrete" style="background-color:#3f597c; font-size: 180% !important; border-radius: 9px;  "><i class="material-icons left">calendar_today</i>adicionar ao calendário</a>
    </div>
</div>

                    
                    <br><br><br><br><br>


                    <div id="conteudoLembretes"></div>

                </div>










            </div>
        </div>
    </div>


    <script>
        setInterval(function() {
            $('.collapsible').collapsible();
            console.log("Estou vivo");
            tamanho();

        }, 1000);

    </script>

</BODY>




</HTML>
