<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '';
$bdBanco = 'ad2';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
	echo "Problemas para conectar no banco. Verifique os dados!";
	echo "Erro: " . mysqli_connect_error();
	die();
}

function buscar_resultado($conexao) {
	$sqlBusca = 'SELECT empate AS resposta FROM resultado';
	$resultado = mysqli_query($conexao, $sqlBusca);
	return mysqli_fetch_assoc($resultado)['empate'];
}

function buscar_candidato_aprovado($conexao) {
	$sqlBusca = "
		 SELECT candidato.nome as nome
		 FROM avaliacao
		 INNER JOIN candidato ON candidato.numero = avaliacao.candidato_numero
		 GROUP BY avaliacao.candidato_numero ORDER BY total DESC LIMIT 1;
	";

	$resultado = mysqli_query($conexao, $sqlBusca);
	return mysqli_fetch_assoc($resultado)['nome'];
}

$resultado = "";

if (buscar_resultado($conexao)) {
	$resultado = "Ocorreu  um empate entre dois ou mais candidatos";
} else {
	$resultado = "O candidato aprovado para a vaga é" . buscar_candidato_aprovado($conexao);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultado de candidato Aprovado</title>
</head>
<body>
<h1><?php echo $resultado; ?></h1>
</body>
</html>

