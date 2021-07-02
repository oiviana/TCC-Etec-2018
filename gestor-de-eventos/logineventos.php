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
    <script src="js/selecthome.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.1/angular-materialize.min.js"></script>





</head>

<BODY onload="LerEventos(); Lernavdados(); Lernavdados2();">




    <!-- Modal -->
    <div id="modal" class="modal modal-fixed-footer" style="width: 30% !important; background: #4E5A6B !important;">
        <div class="modal-content" style="color: white !important;">
            <h4>NOVO EVENTO</h4>
            <ul>
                <li class="divider"></li>
            </ul>
            <div class="row" style="margin-top: 5%;">
                <input type="text" placeholder="Nome" name="nomevento" id="nomevento">
            </div>
            <div class="row">
                <input type="text" placeholder="Descrição" name="descrievento" id="descrievento">
            </div>
            <div class="row">
                <input type="text" placeholder="Responsável" name="responevento" id="responevento">
            </div>
            <div class="row">
                <input type="text" placeholder="Localidade" name="localevento" id="localevento">
            </div>
            <div class="row">
                <input type="text" placeholder="Data" style="width:48%;" id="dataevento" name="dataevento">
                <input type="text" placeholder="Inicio" style="width:25%;" id="inicioevento" name="inicioevento">
                <input type="text" placeholder="Término" style="width:25%;" id="terminoevento" name="terminoevento">
            </div>
            <div class="row">
                <input type="text" placeholder="Observações" name="observa" id="observa">
            </div>


        </div>
        <div class="modal-footer" style="background-color: #2C415D !important;">
            <button type="button" class=" waves-effect waves-light btn-flat" style="background: #4E5A6B !important; color: white !important;" name="insert-data" id="insert-data" onclick="insertData();">Adicionar evento</button>
        </div>

    </div>

<!-- <select>
                            <option style="margin-top: 10px !important;" value="0">Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
 -->


    <div id="modalvisitas" class="modal modal-fixed-footer" style="height: 500% !important; width: 84% !important; background: #4E5A6B !important; overflow: hidden;">
        <div class="modal-content" style="color: white !important; " id="juuj">
            <h4>Registrar Visitas</h4>
            <ul>
                <li class="divider"></li>
            </ul>
            <div class="row">
                <div class="col l4 s12">
                    
                    <div class="row" style="margin-top: 5%;">
                        <input type="text" placeholder="Nome" name="nomevisita" id="nomevisita">
                    </div>
                    <div class="row">
                        <input type="text" placeholder="Email" name="emailvisita" id="emailvisita">
                    </div>
                    <div class="row">
                        <input type="text" placeholder="Município" name="regivisita" id="regivisita">
                    </div>
                    <div class="row">
                        <select class="browser-default" name="bairrovisita" id="bairrovisita">
      <option  value="" disabled selected >Bairro</option>
      <option value="Cerejeiras" >Cerejeiras</option>
      <option value="Alvinópolis">Alvinópolis</option>
      <option value="Centro">Centro</option>
      <option value="Imperial">Imperial</option>
      <option value="Maracanã">Maracanã</option>
      <option value="Tanque">Tanque</option>
      <option value="Colonial">Colonial</option>
      <option value="Outros">Outros</option>
    </select>
                    </div>
<br>
                        <br>

                        <div class="row">
                        <select class="browser-default" name="motivovisita" id="motivovisita">
      <option  value="" disabled selected >Motivo da visita</option>
      <option value="Familiar estuda aqui">Familiar estuda aqui</option>
      <option value="Conhecer a Instituicao">Conheçer a Instituição</option>
      <option value="Assistir a um aluno especifico">Assistir a um aluno específico</option>
      <option value="Conheci pelas Redes Sociais">Conheci pelas Redes Sociais</option>
      <option value="Acaso">Acaso</option>
    </select>
                    </div>
<br>
                        <br>
                    <div class="row">
                        <input type="number" placeholder="Idade" name="idadevisita" id="idadevisita">
                    </div>
            



                </div>
                <div class="col l1 s12"></div>
                <div class="col l7 s12">
                    <br>
                    <div style="width: 100%; height: 500px;" class="barravisita">



                        <div id="conteudoVisitas"> </div>






                    </div>
                </div>
            </div>


        </div>
        <div class="modal-footer" style="background-color: #2C415D !important;">
            <button type="button" class=" btn modal-close" style="height: 88% !important;">Sair</button>
            <button type="button" name="insertvisita" id="insertvisita" class="btn waves-effect waves-teal" onclick="insertVisita();" style="height: 88% !important;"> Cadastrar</button> <a href="coreventos/visitas.csv">
<button type="button" class="btn waves-effect waves-teal" style="height: 88% !important;" >Obter registros</button>
</a>
        </div>

    </div>










    <!-- Modal -->



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
                    <span style="position:fixed; top: 0;left: 0;width: 100%;height: 8%;padding: 8px 50px;transition: .3s;color: white;background:#3f597c; z-index: 1 !important;">
                        
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
                    <div class="container">

                        <div class="row">

                            <!--                                                  <ul class="collapsible" style="border:none !important; border-radius:7px !important;">
    <li>
      <div class="collapsible-header" style="text-transform: uppercase; background:#4E5A6B; color: white; font-size: 200%; letter-spacing:4px;"><i class="material-icons" style="margin-top: 1.7%;">event</i>Evento1</div>
      <div class="collapsible-body" style=" background:#2C415D; border:none !important; border-bottom-left-radius: 7px !important; border-bottom-right-radius: 7px !important;">
        <p style=" font-size:140%; color: white;">Descrição:</p><br>
         <p style=" font-size:140%; color: white;">Local:</p><br>
         <p style=" font-size:140%; color: white;">Responsável:</p><br>
         <p style=" font-size:140%; color: white;">Data:</p><br>
         <p style=" font-size:140%; color: white;">Horário de início:</p><br>
         <p style=" font-size:140%; color: white;">Horário de encerramento:</p><br>
         <p style=" font-size:140%; color: white;">Observações:</p><br><br>
         <button type="button" style="background:#4E5A6B; font-size: 115%; color: white; padding:2%; width:203px; "> Registrar visitas</button>





      </div>
    </li>
    </ul>
 -->


                        </div>



                        <div id="conteudoEventos"> </div>


                    </div>
                </div>





                <div class="row" style="color: white;">
                    <div class="fixed-action-btn">
                        <a onclick="tamanho()" class="btn-floating btn-large btn modal-trigger" data-target="modal" style="background-color: #4E5A6B  !important;">
                            <i class="large material-icons">library_add</i>
                        </a>

                    </div>


                </div>








            </div>
        </div>
    </div>




</BODY>




<script>
    setInterval(function() {
        $('.collapsible').collapsible();
        console.log("Estou vivo");

    }, 1000);

</script>



</HTML>
