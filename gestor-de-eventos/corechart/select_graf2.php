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
$sql6 = "";
$sql7 = "";
$sql8 = "";

     
         $sql = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Cerejeiras') primeiraregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql2 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Alvinópolis') segundaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql3 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Centro') terceiraregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql4 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Colonial') quartaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql5 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Imperial') quintaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql6 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Tanque') sextaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql7 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Maracanã') setimaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";

         $sql8 = "SELECT tb1_evento.*, (SELECT count(*) from tb3_visita WHERE tb3_codevento = tb1_codevento and tb3_bairrovisita = 'Outros') oitavaregiao FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]'   AND tb1_nomeevento = '$_REQUEST[buscagrafico]' ORDER BY tb1_codevento  DESC LIMIT 1";
    

    $rs= mysqli_query($conn, $sql); 
    $rs2= mysqli_query($conn, $sql2);
    $rs3= mysqli_query($conn, $sql3);
    $rs4= mysqli_query($conn, $sql4);
    $rs5= mysqli_query($conn, $sql5);
    $rs6= mysqli_query($conn, $sql6);
    $rs7= mysqli_query($conn, $sql7);
    $rs8= mysqli_query($conn, $sql8);  



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
        

         echo '"colonial": "'.$row["quartaregiao"].'", ';
             
    }
    if ($row = mysqli_fetch_array($rs5)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"imperial": "'.$row["quintaregiao"].'", ';
             
    }
    if ($row = mysqli_fetch_array($rs6)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"tanque": "'.$row["sextaregiao"].'", ';
             
    }
    if ($row = mysqli_fetch_array($rs7)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"maracana": "'.$row["setimaregiao"].'", ';
             
    }

    if ($row = mysqli_fetch_array($rs8)){                    
               
         // echo '"Cerejeiras": "'.$row["primeiraregiao"].'", ';
        

         echo '"outros": "'.$row["oitavaregiao"].'"}';
             
    }



?>