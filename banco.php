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

function inserir_vaga($conexao, $vaga) {
	$sql_gravar = "
			INSERT INTO vaga
			(nome)
			VALUES
			( '$vaga')
		";
	mysqli_query($conexao, $sql_gravar);
}

function buscar_vagas($conexao) {
	$sqlBusca = 'SELECT * FROM vaga';
	$resultado = mysqli_query($conexao, $sqlBusca);

	$vagas = array();

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		$vagas[] = $vaga;
	}

	return $vagas;
}

function remover_vaga($conexao, $id) {
	$sqlRemover = "DELETE FROM vaga WHERE id = {$id}";

	mysqli_query($conexao, $sqlRemover);
}

function buscar_vaga($conexao, $id) {
	$sqlBusca = 'SELECT * FROM vaga WHERE id = ' . $id;
	$resultado = mysqli_query($conexao, $sqlBusca);
	return mysqli_fetch_assoc($resultado);
}

function editar_vaga($conexao, $vaga) {
	$sql_gravar = "
		UPDATE vaga SET
			nome = '{$vaga['nome']}'
		WHERE id = {$vaga['id']}
	";
	mysqli_query($conexao, $sql_gravar);
}

function conta_vagas($conexao) {
	$sqlBusca = "
		SELECT count(id) as qtd
		FROM vaga;
	";
	$resultado = mysqli_query($conexao, $sqlBusca);
	return mysqli_fetch_assoc($resultado)['qtd'];
}

?>