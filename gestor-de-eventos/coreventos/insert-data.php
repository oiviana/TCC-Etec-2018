
 <?php
session_start(); 

include('DB.php');
$nomevento=utf8_decode($_POST['nomevento']);
$descrievento=utf8_decode($_POST['descrievento']);
$responevento=utf8_decode($_POST['responevento']);
$localevento=utf8_decode($_POST['localevento']);
$dataevento=$_POST['dataevento'];
$inicioevento=$_POST['inicioevento'];
$terminoevento=$_POST['terminoevento'];
$observa=utf8_decode($_POST['observa']);
 
$stmt = $DBcon->prepare("INSERT INTO tb1_evento(tb1_nomeevento,tb1_descricao,tb1_responevento,tb1_localevento,tb1_data,tb1_hr_inicio,tb1_hr_termino,tb1_observacoes,tb1_codfuncionario) VALUES(:nomevento, :descrievento,:responevento,:localevento,:dataevento,:inicioevento,:terminoevento,:observa,:codfuncionario)");
 
$stmt->bindparam(':nomevento', $nomevento);
$stmt->bindparam(':descrievento', $descrievento);
$stmt->bindparam(':responevento', $responevento);
$stmt->bindparam(':localevento', $localevento);
$stmt->bindparam(':dataevento', $dataevento);
$stmt->bindparam(':inicioevento', $inicioevento);
$stmt->bindparam(':terminoevento', $terminoevento);
$stmt->bindparam(':observa', $observa);
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