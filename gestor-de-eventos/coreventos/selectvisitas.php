<?php
	/* prepara o documento para comunicação com o JSON, as duas linhas a seguir são obrigatórias 
	  para que o PHP saiba que irá se comunicar com o JSON, elas sempre devem estar no ínicio da página */
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=utf-8");
   
?>
 
<?php

include('dados_conexao.php');



$arquivo = "visitas.csv";
unlink($arquivo); 

$fp = fopen($arquivo, "a+");
fwrite($fp, "Nome; E-mail; Município; Bairro; Motivo da Visita; Idade\n");


	try {
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$conecta->exec("set names utf8");
		$consulta = $conecta->prepare("SELECT * FROM tb3_visita WHERE tb3_codevento = $_GET[cod] ORDER BY tb3_codvisita  ASC ");
		$consulta->execute(array());
		$resultadoDaConsulta = $consulta->fetchAll();
 
 	$StringJson = "[";
 
	if ( count($resultadoDaConsulta) ) {
		foreach($resultadoDaConsulta as $registro) {


			fwrite($fp, "$registro[tb3_nomevisita]; $registro[tb3_emailvisita]; $registro[tb3_regiaovisita]; $registro[tb3_bairrovisita]; $registro[tb3_motivovisita]; $registro[tb3_idadevisita]\n");
 
			if ($StringJson != "[") {$StringJson .= ",";}
			$StringJson .= '{"tb3_codvisita":"' . $registro['tb3_codvisita']  . '",';
			$StringJson .= '"tb3_nomevisita":"' . $registro['tb3_nomevisita']  . '",';
			$StringJson .= '"tb3_emailvisita":"' . $registro['tb3_emailvisita']  . '",';
			$StringJson .= '"tb3_regiaovisita":"' . $registro['tb3_regiaovisita']  . '",';
			$StringJson .= '"tb3_bairrovisita":"' . $registro['tb3_bairrovisita']  . '",';
			$StringJson .= '"tb3_motivovisita":"' . $registro['tb3_motivovisita']  . '",';
			$StringJson .= '"tb3_idadevisita":"' . $registro['tb3_idadevisita'] . '"}';
		}  
		echo $StringJson . "]"; // Exibe o vettor JSON
		fclose($fp);
  } 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); // opcional, apenas para teste
}
?>