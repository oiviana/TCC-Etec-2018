<?php 

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=UTF-8');

include ('conexao.php');
session_start();
mysqli_set_charset($conn,'utf8');

$sql = "";
$sql2 = "";
$sql3 = "";
$sql4 = "";
$sql5 = "";


     
         $sql = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_motivovisita = 'Familiar estuda aqui') primeiromotivo FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql2 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_motivovisita = 'Conhecer a Instituicao') segundomotivo FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql3 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_motivovisita = 'Assistir a um aluno especifico') terceiromotivo FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql4 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_motivovisita = 'Conheci pelas Redes Sociais') quartomotivo FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql5 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_motivovisita = 'Acaso') quintomotivo FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";


    $rs= mysqli_query($conn, $sql); 
    $rs2= mysqli_query($conn, $sql2);
    $rs3= mysqli_query($conn, $sql3);
    $rs4= mysqli_query($conn, $sql4);
    $rs5= mysqli_query($conn, $sql5);
     



    if ($row = mysqli_fetch_array($rs)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '{"mot1": "'.$row["primeiromotivo"].'", ';
             
    }

    if ($row = mysqli_fetch_array($rs2)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"mot2": "'.$row["segundomotivo"].'", ';
             
    }


    if ($row = mysqli_fetch_array($rs3)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"mot3": "'.$row["terceiromotivo"].'", ';
             
    }

    if ($row = mysqli_fetch_array($rs4)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"mot4": "'.$row["quartomotivo"].'", ';
             
    }


    if ($row = mysqli_fetch_array($rs5)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"mot5": "'.$row["quintomotivo"].'"}';
             
    }


?>