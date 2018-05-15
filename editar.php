<?php
include "banco.php";
$tem_erros = false;

$vetor_vaga = array();
$vetor_vaga = buscar_vaga($conexao, $_GET['id']);

if (!empty($_POST)) {
	if (trim($_POST['nome']) == "") {
		$msg_erro['vazia'] = "Por favor digite alguma coisa";
		$tem_erros = true;
	} else if (conta_nome_vaga($conexao, $_POST['nome']) && $_POST['nome'] != $vetor_vaga['nome']) {
		$msg_erro['repetido'] = "Esta vaga já está no banco de dados ";
		$tem_erros = true;
	} else {
		editar_vaga($conexao, $_POST);
		header('Location: index.php');
		die();
	}
}
include "template_editar.php";
?>