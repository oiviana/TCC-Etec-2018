
<?php


include('DB.php');
$nomevisita=utf8_decode($_POST['nomevisita']);
$emailvisita=utf8_decode($_POST['emailvisita']);
$regivisita=utf8_decode($_POST['regivisita']);
$bairrovisita=utf8_decode($_POST['bairrovisita']);
$motivovisita=utf8_decode($_POST['motivovisita']);
$idadevisita=utf8_decode($_POST['idadevisita']);
$codevento=utf8_decode($_POST['codevento']);

$comandoSQL = "
	INSERT INTO 
	tb3_visita(
		tb3_nomevisita,
		tb3_emailvisita,
		tb3_regiaovisita,
		tb3_bairrovisita,
		tb3_motivovisita,
		tb3_idadevisita,
		tb3_codevento) 
	VALUES
		(
		'$nomevisita', 
		'$emailvisita',
		'$regivisita',
		'$bairrovisita',
		'$motivovisita',
		'$idadevisita',
		'$codevento')";

$stmt = $DBcon->prepare($comandoSQL);

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