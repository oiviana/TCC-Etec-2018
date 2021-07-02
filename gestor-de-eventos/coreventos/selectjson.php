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
		$conecta->exec("set names utf8");
		$consulta = $conecta->prepare("SELECT * FROM tb1_evento WHERE tb1_codfuncionario = '$_SESSION[codfuncionario]' ORDER BY tb1_codevento  DESC");
		$consulta->execute(array());  
		$resultadoDaConsulta = $consulta->fetchAll();
 
		$StringJson = "[";
 
	if ( count($resultadoDaConsulta) ) {
		foreach($resultadoDaConsulta as $registro) {
 
			if ($StringJson != "[") {$StringJson .= ",";}
			$StringJson .= '{"tb1_codevento":"' . $registro['tb1_codevento']  . '",';
			$StringJson .= '"tb1_nomeevento":"' . $registro['tb1_nomeevento']  . '",';
			$StringJson .= '"tb1_descricao":"' . $registro['tb1_descricao']  . '",';
			$StringJson .= '"tb1_data":"' . $registro['tb1_data']  . '",';	
			$StringJson .= '"tb1_hr_inicio":"' . $registro['tb1_hr_inicio']  . '",';	
			$StringJson .= '"tb1_hr_termino":"' . $registro['tb1_hr_termino']  . '",';
			$StringJson .= '"tb1_observacoes":"' . $registro['tb1_observacoes']  . '",';	
			$StringJson .= '"tb1_responevento":"' . $registro['tb1_responevento']    . '",';	
			$StringJson .= '"tb1_localevento":"' . $registro['tb1_localevento'] . '"}';
		}  
		echo $StringJson . "]"; // Exibe o vettor JSON
  } 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); // opcional, apenas para teste
}
?>