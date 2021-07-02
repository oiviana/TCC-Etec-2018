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


     
         $sql = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_idadevisita > 0 and tb3_idadevisita < 13) primeiraregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";


         $sql2 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_idadevisita > 12 and tb3_idadevisita < 19) segundaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql3 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_idadevisita > 18 and tb3_idadevisita < 60) terceiraregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql4 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_idadevisita > 59) quartaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";


    

    $rs= mysqli_query($conn, $sql); 
    $rs2= mysqli_query($conn, $sql2);
    $rs3= mysqli_query($conn, $sql3);
    $rs4= mysqli_query($conn, $sql4);
 



    if ($row = mysqli_fetch_array($rs)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '{"cerejeiras": "'.$row["primeiraregiao"].'", ';
             
    }

    if ($row = mysqli_fetch_array($rs2)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"alvinopolis": "'.$row["segundaregiao"].'", ';
              
    }


    if ($row = mysqli_fetch_array($rs3)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"centro": "'.$row["terceiraregiao"].'", ';
             
    }

    if ($row = mysqli_fetch_array($rs4)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"colonial": "'.$row["quartaregiao"].'"}';
             
    }




?>