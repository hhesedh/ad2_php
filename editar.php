<?php
include "banco.php";
$tem_erros = false;

$vetor_vaga = array();
$vetor_vaga = buscar_vaga($conexao, $_GET['id']);

if (!empty($_POST)) {
	if (trim($_POST['nome']) == "") {
		$msg_erro['vazia'] = "Por favor digite alguma coisa";
		$tem_erros = true;
		echo "string";
	} else {
		echo "estou aqui";
		editar_vaga($conexao, $_POST);
		header('Location: index.php');
		die();
	}
}
include "template_editar.php";
?>