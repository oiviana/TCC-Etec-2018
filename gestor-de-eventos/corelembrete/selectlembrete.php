<?php
	/* prepara o documento para comunicação com o JSON, as duas linhas a seguir são obrigatórias 
	  para que o PHP saiba que irá se comunicar com o JSON, elas sempre devem estar no ínicio da página */
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=utf-8");
   
?>
 
<?php
session_start();
include('dados_conexao.php');
 
	try {
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$consulta = $conecta->prepare("SELECT * FROM tb5_lembretes WHERE tb5_codfuncionario = '$_SESSION[codfuncionario]' ORDER BY tb5_datalembrete  DESC");
		$consulta->execute(array());  
		$resultadoDaConsulta = $consulta->fetchAll();
 
		$StringJson = "[";
 
	if ( count($resultadoDaConsulta) ) {
		foreach($resultadoDaConsulta as $registro) {
 
			if ($StringJson != "[") {$StringJson .= ",";}
			$StringJson .= '{"tb5_nomelembrete":"' . $registro['tb5_nomelembrete']  . '",';	
			$StringJson .= '"tb5_assuntolembrete":"' . $registro['tb5_assuntolembrete']    . '",';	
			$StringJson .= '"tb5_datalembrete":"' . $registro['tb5_datalembrete'] . '"}';
		}  
		echo $StringJson . "]"; // Exibe o vettor JSON
  } 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); // opcional, apenas para teste
}
?>