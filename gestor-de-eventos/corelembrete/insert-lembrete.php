<?php

session_start(); 

include('DB.php');
$nomelembrete=$_POST['nomelembrete'];
$assuntolembrete=$_POST['assuntolembrete'];
$datalembrete=$_POST['datalembrete'];


 
$stmt = $DBcon->prepare("INSERT INTO tb5_lembretes(tb5_nomelembrete,tb5_assuntolembrete,tb5_datalembrete, tb5_codfuncionario) VALUES( :nomelembrete, :assuntolembrete, :datalembrete, :codfuncionario)");
 
$stmt->bindparam(':nomelembrete', $nomelembrete);
$stmt->bindparam(':assuntolembrete', $assuntolembrete);
$stmt->bindparam(':datalembrete', $datalembrete);
$stmt->bindparam(':codfuncionario', $_SESSION["codfuncionario"] );



if($stmt->execute())
{
  $res="Prontinho, gravo lá no banco";
  echo json_encode($res);
}
else {
  $error="Not Inserted,Some Probelm occur.";
  echo json_encode($error);
}

 
 
 
 ?>