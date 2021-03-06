<!DOCTYPE html>
<HTML lang="pt-br">

<?php

session_start();

// echo $_SESSION["codfuncionario"] ;

if(!isset($_SESSION["user"])){
  header("location:index.php");
}
$nome = $_SESSION["user"];
 // echo '<h1 align=center>BEMVINDO:'.$_SESSION["user"].'</h1>';
 //echo '<p align=center><a href="logout.php">Logout</a></p>';

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
    <link rel="stylesheet" href="css/divshome.css">
    <link rel="stylesheet" href="css/navopacity.css">
    <link rel="stylesheet" href="css/nvmobileresto.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/hover.css">


    <!--    começam os javascripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/funcoes.js"></script>
    <script src="js/selecthome.js"></script>
    <script src="js/funcoeshtml.js"></script>
    <script src="js/bancodedados.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/graficos.js"></script>

<style type="text/css">
        #mapa svg path {
            cursor: pointer;
            width: 100% !important;
        }
        
        #mapa svg path:hover {
            opacity: 0.7;
        }
        
        #mapa svg text {
            fill: white;
            font-size: 12px;
            font-family: sans-serif;
        }

    </style>

</head>

<BODY onload="Lernavdados(); Lernavdados2(); tamanho();">





    <div class="navbar-fixed-top hide-on-med-and-up" style="margin-top: 0% !important;">
        <nav>
            <div class="nav-wrapper">
                <div class="container">


                    <a href="#!" class="brand-logo right"><img class="logomobailo show-on-med-and-down hide-on-large" src="img/logomobile.png"></a>

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



    <div class="container-fluid" style=" height: 100%;  overflow: hidden;" id="scrollhome">


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

                <div class="row" style="color: white; ">
                    <div class=" col l12 s12" style=" padding-top:6.5%;">
                        <div class=" col l6 s12">
                            <div class="row ">
                                <div class="col l8 s12 oi">

                                    <div class="caixapesquisa ">

                                        <input type="text" class="txtpesquisa" id="inputbuscar" name="inputbuscar" placeholder="Busca">
                                        <a class="botaopesquisa" href="#" onclick="Lerultimoevento(); Graficos();"> <i class="material-icons ">search</i></a>


                                    </div>

                                </div>

                                <div class="col l4 s12 ">
                                    <div id="divnomevento" class="divnomevento animated fadeInDown" style="z-index: -3;">

                                    </div>

                                    <div id="nomeventobuscado"></div>
                                </div>
                            </div>



                            <div class="row ">
                                <div class="col l4 s12 ">
                                    <div class="dados animated fadeInLeft " id="visitaseventobuscado"></div>
                                    <br>
                                </div>

                                <div class="col l4 s12 ">
                                    <div class="dados animated fadeInDown" id="dataeventobuscado"></div>
                                    <br>
                                </div>

                                <div class="col l4 s12 ">
                                    <div class="dados animated fadeInRight" id="horaeventobuscado"></div>
                                    <br>

                                </div>
                            </div>

                            <div class="row ">
                                <div class="col l6 s12 ">
                                    <div class="dadosgraf animated fadeInUp" id="">

                                        <canvas id="graficoregiao"></canvas>
                                    </div>
                                    <br>
                                </div>
                                <div class="col l6 s12 ">
                                    <div class="dadosgraf animated fadeInUp">
                                        <canvas id="grafidade" style="margin-top:6px !important;"></canvas>
                                    </div>






                                </div>


                            </div>




                        </div>

                        <div class=" col l6 s12 " style="height:600px; padding-left: 4%;">
                            <div class="row">
                        <p style="font-size: 210%; color:#3f597c;">① Busque por algum Evento</p><br>
                        <p style="font-size: 210%; color:#3f597c;">② Obtenha informações e o retrospectos</p><br>
                        <p style="font-size: 210%; color:#3f597c;">③ Compare diferentes dados e reflita sobre sua Gestão</p><br>
                        <ul>
                            <li class="divider" style="background: #3f597c; "></li>
                        </ul>
                           <p style="font-size: 220%; color:#3f597c; font-weight: bold; text-align: center; padding-top: 2%;">Principais Regiões de Atibaia</p><br>      

                            </div>
                            <div style="padding-left: 15%;">
                                <div class="row hide-on-med-and-up show-on-small">
    <img src="img/mapaimg.jpg" style="width: 80%;">
</div>
    <img src="img/legenda negrito corrigido.png" style="width: 80%; margin-top: 0% !important;" id="mapalegenda">
                          <div id="mapa" class="hide-on-med-and-down">
    <svg xmlns="http://www.w3.org/2000/svg" width="800" height="600">


        <path id="RM" data-name="regiao_maracana" fill="#9c783a" stroke="#9c783a" stroke-width="1" d="m 81.870755,452.72929 c 0.618852,-0.41114 1.682596,-1.67747 2.363856,-2.81224 1.388921,-2.30242 6.828153,-3.31384 8.68752,-1.61991 0.667237,0.60849 3.866841,1.11009 7.110239,1.11009 3.2434,0 6.21002,0.46049 6.59249,1.02787 0.38247,0.56738 3.43274,1.02786 6.77838,1.02786 5.15438,0 6.66984,-0.4687 9.92752,-3.08359 3.91612,-3.14116 11.02665,-4.30882 12.54896,-2.05573 0.38247,0.56738 3.92681,1.02786 7.87631,1.02786 3.94949,0 7.49382,0.46048 7.8763,1.02787 0.87629,1.291 8.75116,1.34856 10.18293,0.0822 0.58793,-0.52627 2.8411,-1.10188 5.00709,-1.28278 l 3.93816,-0.33714 0.56259,-11.30652 c 0.52298,-10.50889 0.74162,-11.3723 3.10452,-12.32616 1.39807,-0.55916 2.76531,-1.71037 3.03833,-2.56555 0.48176,-1.5048 0.89855,-10.48423 0.70419,-15.1713 -0.15006,-3.61808 -4.95526,-3.02603 -9.08262,1.11832 -3.91556,3.93056 -10.55042,6.2412 -13.61272,4.74463 -1.10105,-0.53449 -3.93504,-3.1576 -6.29775,-5.82183 -2.36271,-2.66423 -5.94142,-6.18364 -7.9527,-7.82 -2.01127,-1.62814 -3.65685,-3.47007 -3.65685,-4.09502 0,-0.61671 -1.25566,-2.77112 -2.79037,-4.80218 l -2.79035,-3.67565 2.76365,-6.14252 c 1.52001,-3.37962 2.77567,-6.60301 2.79036,-7.17039 0.0148,-0.56738 2.61663,-3.92234 5.78209,-7.44997 7.94516,-8.86431 10.89786,-8.69985 19.83518,1.09365 2.23036,2.44221 3.31697,2.7629 9.33392,2.7629 8.17272,0 11.55978,-2.3682 12.69676,-8.85609 0.51222,-2.92736 1.88733,-5.11465 4.68166,-7.43352 2.17604,-1.80904 3.95644,-4.21013 3.95644,-5.3449 0,-1.12654 1.24562,-3.84833 2.76805,-6.05207 1.52245,-2.20374 3.07606,-5.1311 3.45247,-6.49611 0.37644,-1.37323 2.91026,-4.97487 5.63074,-8.0009 2.72047,-3.03426 5.18341,-6.68524 5.47318,-8.13247 0.28979,-1.43901 0.81944,-4.2677 1.177,-6.28232 0.4139,-2.33531 2.09747,-4.94197 4.63311,-7.18683 3.74982,-3.32206 4.50665,-3.5523 12.92796,-3.89767 7.56174,-0.32069 8.94494,-0.64961 8.94494,-2.14618 0,-0.97853 1.26373,-4.04568 2.80826,-6.83325 2.3478,-4.22658 2.80904,-6.50433 2.81297,-13.92141 0.005,-10.78025 -0.96174,-12.00546 -8.16051,-10.32799 -2.62594,0.6085 -8.49091,1.38968 -13.03326,1.74326 -5.11614,0.3947 -9.61186,1.38968 -11.81447,2.61489 -2.24116,1.24989 -5.61267,1.98173 -9.11998,1.98173 -4.29879,0 -6.21816,0.55916 -8.4389,2.45043 -3.61343,3.07537 -13.789,6.16719 -17.19818,5.22978 -3.15198,-0.86341 -10.99306,-7.59798 -10.99306,-9.43992 0,-0.74006 -1.39242,0.0822 -3.09426,1.78438 -2.32238,2.35175 -4.63802,3.38784 -9.28279,4.15257 -13.69609,2.24486 -15.44443,2.28597 -19.30496,0.48515 -2.06875,-0.96208 -5.97326,-2.37642 -8.67668,-3.14115 -4.68948,-1.32389 -5.12888,-1.25811 -9.56409,1.365 -3.77231,2.23664 -5.97399,2.75468 -11.6779,2.7629 -7.137377,0 -8.456226,1.07721 -3.92006,3.15761 1.30643,0.60027 4.45985,2.91091 7.00761,5.13932 l 4.6323,4.04568 -0.34537,9.91685 c -0.26561,7.63087 -0.79319,10.3691 -2.28491,11.8739 -1.06677,1.0772 -2.17242,4.01278 -2.45702,6.529 -0.66665,5.89583 -1.75095,9.33302 -3.55075,11.25718 -2.94839,3.14938 -3.09065,6.94837 -0.40889,10.91182 l 2.55958,3.78254 -3.8528,2.96848 c -2.119035,1.63636 -4.260142,3.30561 -4.758002,3.70854 -0.49786,0.3947 -2.902944,3.19871 -5.34464,6.22475 -3.380956,4.19369 -4.439432,6.45499 -4.439432,9.5057 0,4.28414 -1.90559,5.32845 -4.500747,2.46687 -0.770402,-0.84696 -2.275434,-1.53768 -3.344514,-1.53768 -1.069072,0 -4.049334,-1.3979 -6.622797,-3.10004 -5.752081,-3.80722 -14.954568,-5.85473 -18.908286,-4.21014 -1.504536,0.63316 -6.509195,1.14298 -11.121471,1.14298 l -8.385962,0 0,-3.08359 c 0,-3.00959 -0.134608,-3.0836 -5.5396,-3.0836 -6.56821,0 -12.463387,3.68387 -12.463387,7.78711 0,1.75971 -1.290527,3.20694 -4.500747,5.0571 -3.984475,2.30242 -4.500747,3.0507 -4.500747,6.57011 0,2.25308 0.7206774,4.52261 1.6644394,5.23801 3.4603366,2.62311 5.0866806,7.4993 5.0866806,15.25352 0,7.63909 1.647066,11.48742 4.913844,11.48742 0.654228,0 3.36059,1.94883 6.014141,4.32526 4.464794,4.00456 4.824629,4.72818 4.824629,9.70305 0,2.96025 0.506334,5.66559 1.125187,6.01095 0.618852,0.35359 1.125187,2.60667 1.125187,5.00776 0,3.51941 0.660781,4.9502 3.37556,7.32663 1.856557,1.62814 3.37556,3.53585 3.37556,4.25125 0,3.17405 4.858123,4.48971 16.846861,4.56372 9.469392,0.0822 12.522483,0.46048 15.22096,1.98173 3.466825,1.95705 9.254266,2.60666 11.251868,1.26633 z" />
        <text x="145" y="330"></text>


        <path id="RS" data-name="regiao_da_serra" fill="#627d2d" stroke="#627d2d" stroke-width="1" d="m 334.47513,416.51554 c 0.89214,-1.13476 2.52295,-2.05573 3.62401,-2.05573 1.10106,0 2.00193,-0.46048 2.00193,-1.02787 0,-0.56738 2.80792,-1.02786 6.23974,-1.02786 5.12455,0 6.73321,-0.45226 9.00149,-2.52444 2.52835,-2.31064 2.76176,-3.31384 2.76176,-11.89034 0,-10.69803 -0.94885,-12.30972 -7.23334,-12.30972 -2.21013,0 -4.01853,-0.46048 -4.01853,-1.02787 0,-0.59205 -3.37556,-1.02786 -7.87631,-1.02786 -4.50075,0 -7.8763,0.43581 -7.8763,1.02786 0,1.81727 -3.95067,1.09365 -5.62591,-1.02786 -0.89209,-1.13476 -2.41109,-2.05573 -3.37555,-2.05573 -0.96447,0 -2.48347,-0.92919 -3.37556,-2.05573 -0.8921,-1.13477 -2.29272,-2.05573 -3.11251,-2.05573 -0.8198,0 -2.73334,-1.13477 -4.25235,-2.52444 -2.12218,-1.94061 -2.76182,-3.60164 -2.76182,-7.19506 0,-2.56555 0.50633,-4.67062 1.12518,-4.67062 0.61886,0 1.12519,-1.63636 1.12519,-3.63453 0,-2.77112 0.92185,-4.47327 3.90065,-7.19506 2.14535,-1.95705 4.46002,-3.56052 5.14371,-3.56052 1.82451,0 4.45788,-2.6889 4.45788,-4.5555 0,-0.88808 0.50633,-1.6117 1.12518,-1.6117 0.61886,0 1.12519,-1.20054 1.12519,-2.67244 0,-1.64459 1.29978,-3.78255 3.37552,-5.55048 1.85656,-1.58702 3.37556,-3.89766 3.37556,-5.13932 0,-1.24167 1.51901,-3.55231 3.37557,-5.13933 3.04835,-2.59844 3.37556,-3.50297 3.37556,-9.25079 0,-5.75605 -0.32721,-6.65234 -3.37556,-9.25079 -1.85656,-1.58702 -3.37557,-3.61808 -3.37557,-4.52261 0,-0.90452 -0.50633,-1.64458 -1.12518,-1.64458 -0.61886,0 -1.12518,-0.70717 -1.12518,-1.56236 0,-1.75148 13.92278,-14.88349 15.78295,-14.88349 2.28331,0 6.72077,-5.05709 6.72077,-7.66376 0,-1.43901 0.50634,-2.61489 1.1252,-2.61489 0.61884,0 1.12518,-1.66925 1.12518,-3.70031 0,-2.78758 0.83444,-4.40749 3.37556,-6.57834 1.85656,-1.58703 3.37556,-3.42896 3.37556,-4.09502 0,-0.66605 2.02534,-2.98492 4.50075,-5.15577 3.60681,-3.16583 4.50074,-4.67884 4.50074,-7.63087 0,-2.02284 0.50634,-3.67565 1.1252,-3.67565 0.61884,0 1.12518,-0.82229 1.12518,-1.83371 0,-1.0032 1.01266,-2.49155 2.25037,-3.30562 1.23771,-0.81407 2.25037,-2.56555 2.25037,-3.88944 0,-1.41434 1.39299,-3.4783 3.37556,-5.00776 1.88743,-1.44723 3.37557,-3.60164 3.37557,-4.87619 0,-1.25811 1.519,-3.61809 3.37556,-5.24623 1.85656,-1.61991 3.37556,-3.93055 3.37556,-5.12288 0,-1.87482 -0.53344,-2.11329 -3.97209,-1.74326 -2.84016,0.29603 -5.1648,-0.27958 -8.1576,-2.03106 -9.64825,-5.64092 -18.33902,-8.37093 -22.29185,-6.99771 -1.57085,0.55094 -6.94456,0.99498 -11.94156,0.99498 -10.76651,0 -12.0566,0.92919 -12.11079,8.76563 -0.0513,7.39241 -2.07872,9.55504 -9.33122,9.94152 -4.84095,0.25491 -5.9461,0.66605 -6.28643,2.35998 -0.86219,4.29236 -2.23785,4.75284 -12.15993,4.01278 -5.2891,-0.3947 -9.38753,-0.29602 -9.38516,0.2138 0.002,0.5016 1.04137,2.46687 2.30903,4.36637 3.14556,4.71996 2.66818,11.55321 -0.90675,12.98399 -1.86973,0.74829 -2.53168,1.87483 -2.53168,4.31704 0,1.81727 -0.63292,3.66742 -1.40648,4.11968 -0.77356,0.45226 -1.40648,2.44221 -1.40648,4.42394 0,2.90269 -0.46825,3.6592 -2.43579,3.91411 -3.40533,0.44404 -6.4071,7.4253 -6.49507,15.09728 -0.068,5.94518 -0.18193,6.18364 -3.1649,6.49611 -3.50768,0.37003 -3.70536,0.90452 -1.3707,3.72499 0.9086,1.09365 1.652,3.93878 1.652,6.3152 0,9.74417 -11.62256,14.33256 -19.30531,7.62265 -2.59684,-2.26953 -4.61354,-3.0836 -7.61569,-3.0836 -2.24594,0 -5.17561,-0.69894 -6.51038,-1.55413 -1.56633,-1.00319 -2.68012,-1.17588 -3.14107,-0.49337 -0.39281,0.5756 -1.07706,0.84696 -1.52053,0.60027 -0.44349,-0.25491 -0.80634,0.43582 -0.80634,1.52124 0,1.09365 0.55006,1.98173 1.22235,1.98173 0.67229,0 2.54987,0.56738 4.17239,1.27455 3.49162,1.50479 4.24326,4.15257 4.2663,15.03972 0.0195,9.2179 1.55982,12.63864 6.27273,13.91319 2.9659,0.80585 3.71448,1.76793 5.39343,6.93192 1.07225,3.2974 1.7937,7.95979 1.60321,10.35266 -0.3396,4.25948 -0.44114,4.36638 -5.24833,5.10644 -5.73618,0.88807 -7.7707,2.1873 -8.25137,5.27089 -0.25431,1.63636 -1.26349,2.33531 -3.7244,2.59022 -5.36314,0.55094 -6.18853,1.81727 -6.18853,9.48103 0,6.07674 0.33216,7.22795 2.50075,8.6094 1.37539,0.87986 3.40073,1.60347 4.50074,1.60347 2.46929,0 2.67279,3.34673 0.31223,5.13933 -1.17943,0.8963 -1.68778,3.2645 -1.68778,7.87756 0,8.24759 2.93539,12.67975 8.4021,12.67975 2.18738,0 4.08009,0.76473 5.10014,2.05573 1.42299,1.80082 2.91276,2.05573 12.14323,2.05573 10.83429,0 13.73606,0.96208 13.73606,4.54727 0,1.1101 1.05699,1.61992 3.37556,1.61992 1.85656,0 3.37556,0.46048 3.37556,1.02787 0,0.64961 7.41845,1.02786 20.00496,1.02786 18.71421,0 20.10963,-0.13157 21.62691,-2.05573 z" />
        <text x="0" y="0"></text>


        <path id="RP" data-name="regiao_portao" fill="#f5a082" stroke="#f5a082" stroke-width="1" d="m 231.95323,409.06557 c 3.86531,-1.83371 7.70853,-2.82868 10.92307,-2.82868 5.16735,0 6.13547,-0.91275 3.27171,-3.0836 -2.49487,-1.89127 -2.36207,-16.11693 0.1744,-18.68248 1.60598,-1.61992 1.62688,-1.87483 0.15174,-1.87483 -0.94074,0 -3.04455,-0.96208 -4.67514,-2.12973 -2.7381,-1.96528 -2.96472,-2.73001 -2.96472,-9.94152 0,-8.87253 1.61694,-11.56965 6.92552,-11.56965 2.36141,0 3.20117,-0.5016 3.20117,-1.89949 0,-2.85336 3.77122,-5.40246 8.91415,-6.03563 4.30108,-0.52627 4.58809,-0.76473 4.58809,-3.90589 0,-4.67884 -3.42355,-13.85562 -5.17152,-13.85562 -0.79976,0 -2.85557,-1.10187 -4.56848,-2.45043 -2.96354,-2.32709 -3.14534,-3.00137 -3.75418,-13.85563 -0.80767,-14.39834 -0.85599,-14.43945 -15.97609,-14.18454 -10.35879,0.17268 -11.07423,0.32892 -14.29147,3.14938 -1.86272,1.62814 -3.63041,4.16902 -3.9282,5.64092 -0.29778,1.48013 -0.82855,4.30882 -1.17947,6.29054 -0.37659,2.12151 -2.68155,5.87939 -5.62486,9.15211 -2.74274,3.05893 -5.29477,6.67702 -5.67121,8.05024 -0.37641,1.36501 -1.93002,4.29237 -3.45247,6.49611 -1.52244,2.20375 -2.76807,4.95843 -2.76807,6.1343 0,1.16766 -1.74988,3.60987 -3.88865,5.41891 -2.64196,2.22841 -4.24607,4.76929 -5.0035,7.91045 -1.7043,7.07171 -5.19168,9.25079 -14.79951,9.25079 -8.29017,0 -7.63457,0.31247 -14.94136,-7.06349 -1.7543,-1.76793 -4.07221,-3.21516 -5.15092,-3.21516 -3.29068,0 -11.69749,10.59112 -14.60888,18.4029 l -2.66206,7.13749 2.39777,2.78758 c 1.31878,1.52946 2.39778,3.37139 2.39778,4.09501 0,0.72362 1.54917,2.49977 3.44258,3.95523 1.89344,1.45545 5.49462,5.0242 8.00265,7.91867 4.30163,4.97487 4.78992,5.238 8.61638,4.67062 2.67352,-0.3947 5.29592,-1.84193 7.6926,-4.22658 2.86484,-2.86158 4.49163,-3.62631 7.66807,-3.62631 3.13451,0 4.23692,0.5016 4.95366,2.27775 0.85053,2.09684 1.02889,1.98172 2.30423,-1.55413 1.62128,-4.4815 4.70427,-6.42211 7.80657,-4.90909 1.99151,0.97853 5.77259,6.93193 5.77259,9.09455 0,3.50297 9.87613,6.29054 21.42604,6.05208 6.82375,-0.13979 9.65479,-0.72362 14.44998,-2.99315 z" />
        <text x="0" y="0"></text>

        <path id="RC" data-name="regiao_centro" fill="#5db9c2" stroke="#5db9c2" stroke-width="1" d="m 274.75394,299.75826 c 3.84838,-2.95203 4.42879,-6.455 1.77411,-10.69802 -2.67515,-4.27592 -2.15424,-7.01416 1.40649,-7.38419 2.96673,-0.31247 3.07944,-0.53449 2.73465,-5.40246 -0.19778,-2.78757 0.11892,-6.0274 0.70379,-7.19506 0.58487,-1.16765 1.64498,-3.43718 2.3558,-5.04887 0.7108,-1.61169 2.25783,-3.1576 3.43782,-3.43718 2.13873,-0.51805 4.19594,-3.39607 2.42182,-3.39607 -0.5136,0 -0.69187,-1.15943 -0.39611,-2.57377 0.29576,-1.40612 1.04339,-2.56556 1.6614,-2.56556 0.70568,0 0.8359,-2.10506 0.35007,-5.65737 l -0.7736,-5.65737 2.77863,0.97031 c 1.52824,0.52626 3.08385,0.6825 3.45691,0.34536 1.34706,-1.23344 0.63279,-5.58336 -1.56175,-9.51392 -3.68264,-6.59479 -2.49831,-7.49108 9.35257,-7.06349 l 10.15725,0.36181 0.88147,-2.99315 c 1.13253,-3.84833 2.56995,-4.59661 7.63677,-3.97989 5.41364,0.66605 7.09791,-1.24989 8.22795,-9.34124 0.48357,-3.46185 1.12816,-8.0338 1.4325,-10.14709 l 0.55333,-3.85655 -4.23745,0 c -2.55583,0 -5.79238,-0.94564 -8.15554,-2.38465 -7.90839,-4.81041 -14.57043,-5.83005 -37.89606,-5.78071 -21.27925,0.0822 -21.61153,0.0822 -22.31189,2.30242 -0.39102,1.24166 -1.41556,3.69209 -2.27674,5.44357 -0.86117,1.74326 -2.32788,5.8465 -3.25936,9.111 -0.93149,3.27272 -2.33854,6.65234 -3.1268,7.52397 -2.14395,2.35998 -8.11273,4.34171 -13.0803,4.34171 -5.18619,0 -5.46416,0.50982 -6.9921,12.8442 -1.87088,15.11373 -2.98723,20.62309 -4.83938,23.89582 -1.01098,1.78437 -1.83813,5.64092 -1.83813,8.56828 l 0,5.32023 4.78204,-0.65783 c 2.63013,-0.36181 6.59881,-0.92097 8.8193,-1.24989 6.98025,-1.03608 7.9062,0.81407 7.70059,15.32753 -0.16562,11.70122 -0.0298,12.53174 2.32537,14.275 1.37571,1.01964 4.27711,1.85015 6.44755,1.85015 2.78027,0 5.0822,0.91275 7.7908,3.0836 4.7099,3.77432 7.07871,3.86477 11.55623,0.41937 z" />
        <text x="0" y="0"></text>

        <path id="RU" data-name="regiao_usina" fill="#9f77d4" stroke="#9f77d4" stroke-width="1" d="m 186.06392,277.61393 c 2.10361,-0.64139 5.11829,-2.26131 6.69929,-3.60164 2.16315,-1.82549 4.16727,-2.42576 8.09806,-2.42576 3.41086,0 7.05944,-0.8963 10.51399,-2.57378 2.90976,-1.40612 6.73407,-2.56555 8.49845,-2.56555 3.14181,0 3.20797,-0.11512 3.20797,-5.70671 0,-3.39607 0.77472,-7.0306 1.91359,-8.99588 1.89696,-3.25627 2.95219,-8.45316 4.73736,-23.32843 1.48062,-12.33438 2.27139,-13.83096 7.48835,-14.1352 7.69836,-0.45226 12.62222,-2.34354 13.76634,-5.27912 1.31736,-3.38784 5.66719,-15.17129 6.92142,-18.75649 0.79766,-2.27775 0.51727,-2.91913 -1.76626,-4.03745 -2.3798,-1.15943 -3.13875,-1.04431 -6.15627,0.99497 -4.99307,3.3714 -23.15285,4.39104 -28.80162,1.61169 -3.63028,-1.79259 -4.0237,-1.80082 -7.05462,-0.16445 -2.61213,1.41434 -6.24452,1.73503 -19.50345,1.73503 -16.07607,0 -16.31773,0 -18.11068,-2.53266 -0.99945,-1.39789 -1.81719,-3.93878 -1.81719,-5.65737 0,-2.96847 -0.22579,-3.11649 -4.61199,-3.11649 -2.53659,0 -6.39045,-0.77295 -8.56413,-1.71036 -3.72751,-1.61992 -9.72515,-7.99268 -12.89635,-13.70762 -0.78419,-1.41434 -2.8337,-4.50616 -4.55446,-6.86614 -1.72077,-2.3682 -3.12867,-4.59661 -3.12867,-4.95842 0,-0.36181 -1.519,-2.67245 -3.37555,-5.13933 -1.85656,-2.45865 -3.37556,-4.98309 -3.37556,-5.60803 0,-1.52946 -9.73113,-10.31977 -11.43103,-10.31977 -2.09582,0 -6.57196,-4.25125 -6.57196,-6.2412 0,-1.29099 -1.60792,-2.12973 -5.90723,-3.06715 -5.43627,-1.1841 -7.13794,-2.40931 -21.34401,-15.37686 -8.490217,-7.754218 -15.705483,-13.847404 -16.033903,-13.551379 -0.328428,0.304249 -0.597141,1.323891 -0.597141,2.269527 0,0.953859 -1.086174,2.606667 -2.413723,3.68387 -1.327558,1.077203 -3.326628,3.823662 -4.442391,6.101412 -1.115761,2.27775 -3.338644,5.26267 -4.93974,6.6359 -2.832428,2.43398 -2.889875,2.73823 -2.12617,11.28185 0.431702,4.82685 0.787144,9.35768 0.78988,10.06485 0.0027,0.70717 0.426915,1.28278 0.942619,1.28278 0.515714,0 0.937658,1.63636 0.937658,3.63453 0,2.45865 1.280625,5.37779 3.938154,8.97943 2.165984,2.94381 3.938153,5.91228 3.938153,6.59479 0,0.69072 1.265835,2.96025 2.812967,5.04065 3.123518,4.21013 3.324639,5.48469 1.685035,10.70624 -0.926128,2.94381 -0.761544,4.04568 0.919871,6.15897 3.551038,4.45683 3.621609,5.92873 0.551476,11.51209 -4.039266,7.34307 -3.973573,12.4824 0.232959,18.19733 3.139039,4.2677 3.338215,5.15578 3.463714,15.41798 0.09316,7.61443 0.719165,12.28505 2.08201,15.51666 1.07187,2.54088 2.41285,7.86111 2.979944,11.81634 1.631449,11.38875 5.022531,19.34854 10.500648,24.6441 4.502589,4.34992 5.188886,4.65417 10.6324,4.65417 4.36256,0 6.91063,-0.65783 10.17975,-2.63956 4.99456,-3.01781 9.93587,-2.77934 17.13755,0.83874 3.34919,1.6857 5.31945,1.94061 10.68928,1.42257 15.04201,-1.47191 15.91245,-1.71859 18.97075,-5.37779 3.34288,-4.00457 6.17808,-4.57195 6.17808,-1.23344 0,1.24988 1.61833,3.79077 3.59628,5.65737 3.93856,3.70854 7.73567,4.29236 14.5201,2.22019 z" />
        <text x="0" y="0"></text>

        <path id="RBV" data-name="regiao_boa_vista" fill="#ebbc02" stroke="#ebbc02" stroke-width="1" d="m 389.60928,207.34083 c 0.79195,-0.87163 3.24486,-1.53769 5.6434,-1.53769 2.67794,0 4.47464,-0.55093 4.87179,-1.49657 0.34611,-0.82229 2.76049,-2.73001 5.36543,-4.2348 2.60485,-1.49658 8.17867,-5.68204 12.38623,-9.29191 6.46757,-5.55047 8.27436,-6.56189 11.68863,-6.56189 2.2212,0 5.65905,-0.76473 7.63956,-1.70214 4.57555,-2.17086 10.91467,-3.50297 10.91467,-2.30242 0,1.70214 1.99104,0.93741 5.62593,-2.16263 1.98753,-1.69392 4.57267,-3.0836 5.74494,-3.0836 1.17226,0 2.13137,-0.46048 2.13137,-1.02786 0,-0.56738 1.30206,-1.02787 2.89335,-1.02787 3.92186,0 5.59334,-1.78437 6.49521,-6.94014 0.84884,-4.85153 3.76883,-10.06486 9.02984,-16.1416 l 3.52274,-4.07035 -0.24322,-12.89354 c -0.13385,-7.08816 -0.33468,-15.20419 -0.44638,-18.03287 -0.17959,-4.53906 1.32763,-17.942419 3.00461,-26.724501 0.79311,-4.144353 -3.81673,-10.303321 -11.84877,-15.81268 -5.22914,-3.593417 -6.97732,-4.226582 -11.5869,-4.226582 -7.41885,0 -10.08905,2.762902 -12.68823,13.132007 -2.04937,8.173585 -4.10315,11.536761 -7.05096,11.536761 -0.93067,0 -4.17192,2.327087 -7.20273,5.163995 l -5.51062,5.17222 -3.18058,-2.07218 c -5.07315,-3.29739 -10.19483,-9.168557 -10.19483,-11.676548 0,-2.623113 -9.40268,-14.513458 -14.68179,-18.575582 -3.94896,-3.034259 -9.08485,-3.461851 -17.30601,-1.455458 -4.67852,1.142987 -5.45238,1.019643 -11.51444,-1.776151 -6.99848,-3.239831 -6.85617,-3.231609 -28.19582,-1.825489 -12.60534,0.830515 -12.63135,0.838738 -15.98818,4.432156 -2.16957,2.318864 -3.37862,4.761072 -3.40812,6.890809 -0.0361,2.590221 -1.02439,4.004563 -4.66944,6.677012 -2.54306,1.866604 -5.63778,5.361346 -6.87718,7.76244 -2.07947,4.037455 -2.12146,4.629505 -0.54391,7.713101 1.68737,3.28917 6.41887,22.13611 6.41887,25.56507 0,0.9703 -1.31084,3.19049 -2.91298,4.92553 -2.51519,2.73001 -3.65796,3.16582 -8.36816,3.16582 l -5.45518,0 0.61081,3.43719 c 0.37818,2.12973 -0.0659,4.63772 -1.16621,6.57833 -1.62239,2.86158 -1.61962,3.42896 0.0319,6.455 1.67025,3.0507 1.65781,4.04568 -0.16234,12.87709 -1.89665,9.20146 -2.77631,11.03517 -9.12179,18.96206 l -2.87882,3.59342 9.36676,0.56738 c 10.02336,0.6085 16.34642,2.22019 21.71697,5.54225 1.84179,1.14299 5.63934,2.31065 8.43889,2.60667 4.77782,0.5016 5.11186,0.74006 5.44275,3.88122 l 0.35259,3.33851 7.95579,0 c 4.37563,0 9.91326,-0.53449 12.30577,-1.19233 6.00876,-1.64458 15.86297,1.07721 25.60429,7.07172 4.46546,2.74645 6.08753,2.90269 8.00053,0.79762 z" />
        <text x="380" y="140"></text>

        <path id="RT" data-name="regiao_tanque" fill="#de7504" stroke="#de7504" stroke-width="1" d="m 214.92408,185.4843 c 2.24232,-1.33211 2.84866,-1.31567 5.30505,0.15624 2.10716,1.2581 5.60499,1.66103 14.56103,1.66103 6.70018,0 12.0899,-0.44404 12.48799,-1.03609 0.38519,-0.56738 2.23328,-1.75971 4.10686,-2.64778 3.10851,-1.46368 3.58359,-1.45546 5.43053,0.0822 1.67781,1.38967 4.46693,1.63636 16.30596,1.46368 l 14.28195,-0.2138 2.75252,-3.70031 c 1.51388,-2.03107 3.91275,-5.14755 5.33082,-6.91548 1.56921,-1.95706 3.3283,-6.70991 4.4946,-12.12881 1.78725,-8.30516 1.79075,-9.15212 0.052,-12.49885 -1.74638,-3.36317 -1.73941,-3.8401 0.11015,-7.58975 1.61445,-3.27273 1.74439,-4.60484 0.71268,-7.30196 -0.69403,-1.81727 -1.26184,-3.66742 -1.26184,-4.10324 0,-0.43581 3.09522,-0.71539 6.87827,-0.61672 6.20379,0.15624 7.09578,-0.0822 9.09638,-2.49977 2.21084,-2.66422 2.21012,-2.70534 -0.21829,-13.36225 -1.34,-5.87939 -3.15487,-12.03013 -4.03302,-13.67472 -0.87816,-1.636357 -1.59665,-3.790763 -1.59665,-4.785737 0,-3.297392 5.69811,-11.725888 9.34458,-13.822733 5.0088,-2.886245 5.34863,-6.767465 0.94443,-10.788474 -4.61053,-4.218359 -10.92926,-4.284143 -16.15709,-0.172681 -2.75284,2.162628 -5.84948,3.248054 -12.13491,4.251251 -4.66728,0.740063 -10.28402,2.409316 -12.56731,3.733207 -3.84966,2.228411 -9.93643,8.412049 -9.93643,10.089525 0,0.411146 -1.26161,2.253081 -2.8036,4.103239 -5.23929,6.27409 -10.69863,3.108264 -10.69863,-6.200084 0,-5.106435 -0.33305,-5.731377 -6.03936,-11.372302 -9.29539,-9.185004 -11.96359,-13.288243 -11.96359,-18.386455 0,-2.425762 -0.40024,-4.645951 -0.88942,-4.917308 -0.48919,-0.279579 -2.50873,0.213796 -4.48789,1.085426 -3.25826,1.439011 -3.9539,1.439011 -7.35832,0 -3.0195,-1.315668 -4.61867,-1.414343 -8.12138,-0.53449 -2.39884,0.608496 -6.40895,0.7894 -8.91136,0.411146 -4.58591,-0.690725 -18.8432,-2.162629 -31.83559,-3.272723 l -7.03242,-0.600274 0,-6.948369 c 0,-8.55184 -1.15995,-9.719495 -8.99621,-9.02877 -5.27659,0.460484 -6.09479,0.962082 -13.80548,8.35449 -4.50805,4.325257 -8.56226,7.861114 -9.00936,7.861114 -0.4471,0 -2.71599,-1.570578 -5.04202,-3.494742 -2.32604,-1.915941 -6.29137,-3.996341 -8.81187,-4.61306 -3.39604,-0.838738 -6.45371,-2.943806 -11.80801,-8.13247 -3.97391,-3.856551 -8.49112,-8.527171 -10.03826,-10.385552 -3.176925,-3.823659 -4.581301,-4.021009 -16.235036,-2.351756 -7.725001,1.110095 -7.879583,1.200547 -16.943207,9.431693 -8.937142,8.124247 -9.365073,8.362712 -18.645748,10.591124 -9.224145,2.203744 -9.498682,2.359979 -9.498682,5.328454 0,2.162629 0.757908,3.396067 2.60343,4.234805 3.474127,1.587025 9.21103,6.668791 9.21103,8.165363 0,0.666057 2.784837,3.568748 6.188527,6.463217 3.40369,2.894469 6.188527,5.871167 6.188527,6.619453 0,0.756509 2.025336,3.174048 4.500747,5.377792 2.48407,2.220189 4.500746,5.007759 4.500746,6.224751 0,4.226583 3.394204,8.264038 18.242579,21.70029 13.050797,11.80812 15.664187,13.70762 20.567737,14.93283 4.00272,1.0032 5.73403,1.98995 6.02339,3.42896 0.52303,2.60667 3.45412,5.62448 5.46507,5.62448 1.85988,0 12.71168,9.67016 12.71168,11.33119 0,0.62494 1.519,3.16582 3.37556,5.62448 1.85656,2.46687 3.37556,4.77751 3.37556,5.13932 0,0.36181 1.519,2.68068 3.37556,5.13933 1.85656,2.46688 3.37556,4.75285 3.37556,5.08999 0,1.61169 8.4958,12.00547 11.07695,13.55138 1.61748,0.9703 5.98944,2.03106 9.71549,2.35175 6.70421,0.59205 6.77092,0.62494 6.41732,3.61809 -0.19651,1.66103 0.23946,4.03745 0.96883,5.28734 1.29818,2.21196 1.67348,2.24486 17.79771,1.70214 11.70519,-0.3947 17.20415,-0.99497 19.00323,-2.06395 z" />
        <text x="200" y="130"></text>


    </svg>
</div><br>


    


</div>
                        </div>

                    </div>

                </div>







            </div>
        </div>



    </div>





    <script>
        $(document).ready(function() {
            $("#buscarvento ").change(function() {
                alert("sai daí ");
            });
        });

    </script>

</BODY>

</HTML>
