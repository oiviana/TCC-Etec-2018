<!DOCTYPE html>
<HTML lang="pt-br">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Reinvisit</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">


    <!--    começam as estilizações CSS-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/edicoes.css">
    <link rel="stylesheet" href="css/nvmobileindex.css">
    <link rel="stylesheet" href="css/botoeshome.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/hover.css">


    <!--    começam os javascripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <script src="js/materialize.min.js"></script>
    <script src="js/funcoes.js"></script>
    <script src="js/bancodedados.js"></script>
    <script src="js/jquery.mask.min.js"></script>
<style>
    * {
    margin: 0;
    padding: 0;
}
</style>
</head>

<BODY style="background-color: #274E75 !important;" onload="tamanho();">





    <div id="modalentrar" class="modal modal-fixed-footer" style="width: 30% !important; background: #3F66AF !important;">
        <div class="modal-content" style="color: white !important;">
            <h4 style="text-align: center;">Acesse e inicie sua gestão</h4>
            <ul>
                <li class="divider"></li>
            </ul>
            <div class="row" style="margin-top: 30%;">
                <input type="text" placeholder="Email" name="user" id="user">
            </div>
            <div class="row">
                <input type="password" placeholder="Senha" name="pass" id="pass">
            </div>
            <div class="row">
                
            </div>

                <div class="row">
            <div class="container">
                <button type="button" class=" waves-effect waves-light btn-flat"  name="login" id="login" style="background:#f6b93b !important; color: white !important; width: 100%; height: 40px !important; font-size: 150% !important; color:#3F66AF !important; ">Acessar</button>
            </div>    
            </div>
           
        </div>
        <div class="modal-footer" style="background-color: #294699 !important;">
            <button type="button" class=" waves-effect waves-light btn-flat modal-close" style="background: #375999 !important; color: white !important;">Cancelar</button>
        </div>

    </div>



<div id="modalcadastro" class="modal modal-fixed-footer" style="width: 30% !important; background: #3F66AF !important;">
        <div class="modal-content" style="color: white !important;">
            <h4 style="text-align: center;">Cadastre-se</h4>
            <ul>
                <li class="divider"></li>
            </ul>
            <form method="POST">
            <div class="row" style="margin-top: 10%;">
                <input type="text" placeholder="Nome" name="nome" id="nome">
            </div>
            <div class="row" style="margin-top: 10%;">
                <input type="email" placeholder="Email" name="email" id="email">
            </div>
            <div class="row" style="margin-top: 10%;">
                <input type="text" placeholder="CPF" name="cpf" id="CPF">
            </div> <br><br>
            <div class="row">
                <input type="password" placeholder="Senha" name="senha">
            </div>
         

                <div class="row">
            <div class="container">
                <button type="submit" value="Cadastrar" class=" waves-effect waves-light btn-flat" name="btcadastro" style="background:#f6b93b !important; color: white !important; width: 100%; height: 40px !important; font-size: 150% !important; color:#3F66AF !important; ">Cadastrar</button>
            </div>    
            </div>
           </form>
        </div>
        <div class="modal-footer" style="background-color: #294699 !important;">
            <button type="button" class=" waves-effect waves-light btn-flat modal-close" style="background: #375999 !important; color: white !important;">Cancelar</button>
        </div>

    </div>























    <div class="navbar-fixed">
        <nav  style="background: transparent !important; box-shadow: none;">
            <div class="nav-wrapper primeiranav" id="navcor" >
                <div class="container">
                    <p class="left logo hide-on-med-and-down animated fadeInDown" id="logo">Reinvisit</p>

                    <a href="#!" class="brand-logo right"><img class=" 
        logomobailo show-on-med-and-down hide-on-med-and-up" src="img/logomobile.png"></a>

                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color: #E2B13C !important;
">list</i></a>

                    <ul class="right hide-on-med-and-down animated fadeInDown">
                        <li><a class="scroll hvr-grow linav" href="#primeira" id="li"> HOME</a></li>&nbsp;
                        <li><a class="scroll hvr-grow linav" href="#segunda" id="li2">SOBRE </a></li>&nbsp;
                        <li><a class="scroll hvr-grow linav" href="#terceira" id="li3">ENTRAR </a></li>&nbsp;
                        <li><a class="scroll hvr-grow linav" href="#quarta" id="li4">CONHEÇER </a></li>&nbsp;
                    </ul>


                </div>
            </div>

        </nav>
    </div>

        
    <ul class="sidenav" id="mobile-demo">
        <li><a class="scroll" href="#primeira"> HOME</a></li><br>
        <li><a class="scroll" href="#segunda">SOBRE </a></li><br>
        <li><a class="scroll" href="#terceira" ">ENTRAR </a></li><br>
        <li><a class="scroll" href="#quarta" ">CONHEÇER </a></li><br>
    </ul>


<div class="container" style="padding-top: 15%; padding-bottom: 20%;">
<div class="row ">
    <div class="col l6 s12">
    <p style="font-size: 380%; font-weight: bolder; color:#eeeeee;" class="animated fadeInLeft">Um sistema inovador para o gerenciamento de seus Eventos!</p><br>
<a href="#primeira" class="scroll ">
    <button type="button" class="btn btmais animated fadeInUp" style=" font-size: 100% !important; box-shadow: none !important; " >Saiba mais</button></a>
</div> 

</div>
</div>

<div class="container-fluid" style="background-color:#FDCA49;" id="primeira">
    <div class="row">
        <div class="col l4 s12"></div>

        <div class="col l5 s12">
            
            <p style="font-size: 215%; font-weight: bolder; padding-top: 24%; padding-bottom: 24%;">Conheça tudo que o nosso sistema pode oferecer a você!</p>
        </div>


        <div class="col l3 s12"></div>



    </div>
    
<br><br>
</div>



<div class="container-fluid" style="background: #FFFFFF; margin: 0% !important; padding-top: 6%;" id="segunda">
    <div class="row" style="text-align: center;">
        <p style="font-size: 420%; font-weight: bold">
            Possui Design Responsivo!
        </p>
        
    </div>
<div class="container" style="padding-top: 2%;">
    <div class="row">
        <div class="col l6 s12">
        <img src="img/phone.jpg" class="responsive-img"> 
        </div>

        <div class="col l6 s12" style="padding-top: 2% !important;">
            <div class="row">
                <div class="col l6 s12" style="text-align: center;">
                    <ul><li class="material-icons " style="color:#FDCA49; font-size: 100px !important;">calendar_today</li></ul><br>
                    <p style="font-size: 250% !important; font-weight: bold;">Calendário</p><br>
                    <p style="font-size: 150% !important; ">Marque todos os eventos que sua instituição tem agendado!</p>
         
                </div>

               <div class="col l6 s12" style="text-align: center;">
                     <ul><li class="material-icons " style="color:#FDCA49; font-size: 100px !important;">layers</li></ul><br>
                    <p style="font-size: 250% !important; font-weight: bold;">Organização</p><br>
                    <p style="font-size: 150% !important; ">Insira os dados sobre seu evento e visitantes de maneira organizada!</p>
         
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12" style="text-align: center;">
                     <ul><li class="material-icons " style="color:#FDCA49; font-size: 100px !important;">pie_chart</li></ul><br>
                    <p style="font-size: 250% !important; font-weight: bold;">Gráficos</p><br>
                    <p style="font-size: 150% !important; ">Vizualize nos gráficos as informações sobre os eventos cadastrados.</p>

                </div>
                <div class="col l6 s12" style="text-align: center;">
                     <ul><li class="material-icons " style="color:#FDCA49; font-size: 100px !important;">lock</li></ul><br>
                    <p style="font-size: 250% !important; font-weight: bold;">Segurança</p><br>
                    <p style="font-size: 150% !important; ">Proteção garantida de todos os seus dados. Para não ter dor de cabeça.</p>

                </div>
            </div>






            <!-- <img src="img/atributos.jpg" class="responsive-img"> -->
        </div>
        
    </div><br><br>
    </div>

</div>


<div class="container-fluid" style="background: #7F7F7F; padding-top: 5%;padding-bottom: 5%;" id="terceira">
    <div class="row" style="text-align: center;"> <p style="font-size: 230%;font-weight: bold; color: white;">Cadastre-se já e otimize de uma vez por todas a gestão de seus eventos!</p> </div>
<div class="container">
    <div class="row">
        <div class="col l3 s12"></div>
        <div class="col l3 s12"> <button id="btentrar" type="button" class="modal-trigger btn" data-target="modalentrar" style="background:#FDCA49; cursor:pointer; font-size: 130%;border-radius: 12px; color:#274E75; width:80%; font-weight: bold">Entrar</button></div>
        <div class="col l3 s12"><button id="btcad" type="button" class="modal-trigger btn" data-target="modalcadastro" style="background:#FDCA49; cursor:pointer; font-size: 130%;border-radius: 12px; color:#274E75; width:80%; font-weight: bold">Cadastrar</button></div>
        <div class="col l3 s12"></div>
    </div>
    </div>
</div>


<div class="container-fluid" style="background: #FFFFFF;  padding-top: 6%;" id="quarta">
    <div class="container">

        <div class="row" style="">
            <p style="font-size: 200%; font-weight: bold;text-align: center !important;">
            Conheça nossa equipe!
        </p><br>

            <p style="font-size: 160%; text-align: justify; !important;">
           Somos jovens cheios de energia prontos para adquirir novas experiencias e principalmente trabalhar duro para atender a necessidade dos nossos clientes!
        </p><br><br>
            
        </div>
        <div class="row">

     <div class="carousel carousel-slider" data-indicators="true" style="width: 60% !important; height: 1050px; margin-left: 20% !important;" id="caroca">
    <a class="carousel-item" href="#one!"><img src="img/Mimi.jpg">
<div class="divslider">
<p style="font-size: 200% !important; font-weight: bold !important;text-align: center !important; color: black !important;">
            Milena Guedes
        </p><br>
        <p style="font-size: 160% !important; text-align: center !important; color: black !important;">
           UX Designer
        </p>
</div>
    </a>
    <a class="carousel-item" href="#two!"><img src="img/Augustão.jpg">
        <div class="divslider">
<p style="font-size: 200% !important; font-weight: bold !important;text-align: center !important; color: black !important;">
            Augusto Lourenço
        </p><br>
        <p style="font-size: 160% !important; text-align: center !important; color: black !important;">
           Designer
        </p>
</div>
    </a>
    <a class="carousel-item" href="#three!"><img src="img/Viana.jpg">
        <div class="divslider">
<p style="font-size: 200% !important; font-weight: bold !important;text-align: center !important; color: black !important;">
            Lucas Viana
        </p><br>
        <p style="font-size: 160% !important; text-align: center !important; color: black !important;">
           Programador
        </p>
</div>
    </a>
    <a class="carousel-item" href="#four!"><img src="img/Rafa.jpg">
        <div class="divslider">
<p style="font-size: 200% !important; font-weight: bold !important;text-align: center !important; color: black !important;">
            Rafael Gomes
        </p><br>
        <p style="font-size: 160% !important; text-align: center !important; color: black !important;">
           Gestor de projetos
        </p>
</div>

    </a>

     <a class="carousel-item" href="#five!"><img src="img/Vini.jpg">
        <div class="divslider">
<p style="font-size: 200% !important; font-weight: bold !important;text-align: center !important; color: black !important;">
           Vinícius Souza
        </p><br>
        <p style="font-size: 160% !important; text-align: center !important; color: black !important;">
           Analista
        </p>
</div>

    </a>
  </div><br><br>
        



        </div>

    </div>
    
<br><br>
</div>
<div class="container-fluid" style="background: #7F7F7F; padding-top: 5%;padding-bottom: 5%; text-align: center;color: white;">
   <p>© Your Website 2018. All Rights Reserved.</p>
</div>


  

</BODY>


<?php

require_once 'core/dadosconexao.php';

// Cria a conexão
$conn = new mysqli($server, $user, $pass, $database);
// Testa ela
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 //se o botão for clicado

if (isset($_POST['btcadastro'])): 

$nome = addslashes($_POST['nome']);
$sobrenome = addslashes($_POST['sobrenome']);
$email = addslashes($_POST['email']);
$cpf = addslashes($_POST['cpf']);
$senha = md5(addslashes($_POST['senha']));


$sql = "INSERT INTO tb4_funcionario (tb4_nomefuncionario, tb4_sobrenofuncionario, tb4_emailfuncionario, tb4_cpffuncionario, tb4_senhafuncionario, tb4_statusfuncionario)
VALUES ('".$nome."' ,'".$sobrenome."','".$email."', '".$cpf."' , '".$senha."', '0')";


if ($conn->query($sql) === TRUE) {
   
echo "<script>  M.toast({html: 'Confirme o cadastro em seu email!',classes: 'blue darken-3'}); </script>";

} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();

endif;//se o botão for clicado *final

?>


<script>
    $(document).ready(function() {
        $('#login').click(function() {
            var user = $('#user').val();
            var pass = $('#pass').val();
            console.log(user + " " + pass);
            if ($.trim(user).length > 0 && $.trim(pass).length > 0) {
                $.ajax({
                    url: "loginindex/logueame.php",
                    method: "POST",
                    data: {
                        user: user,
                        pass: pass
                    },
                    cache: "false",
                    beforeSend: function() {
                        $('#login').val("Conectando...");
                    },
                    success: function(data) {
                        $('#login').val("Login");

                        if (data == 1) {

                            $(location).attr('href', 'login.php');
                        } else {


                            M.toast({
                                html: 'Credenciais não conferem!',
                                classes: 'blue darken-3'
                            });
                        }
                    }
                });
            } else {
                M.toast({
                    html: 'Preencha todos os campos',
                    classes: 'blue darken-3'
                });

            };
        });
    });
</script>


<script>
jQuery(document).ready(function($) { 
    $(".scroll").click(function(event){        
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 600);
   });
});
</script>


</HTML>