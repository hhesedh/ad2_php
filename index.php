<?php
include "banco.php";

$tem_erros = false;
$msg_erro = array();
$vagas = array();

function conta_ocorrencias($vetor, $conexao) {
	$valor = 0;
	foreach ($vetor as $key => $value) {
		$valor += conta_nome_vaga($conexao, $value);
	}
	return ($valor == 0) ? false : true;
}

if (conta_vagas($conexao) >= 5 || conta_vagas($conexao) + count(array_filter($_POST, "trim")) > 5) {
	$msg_erro['limite'] = "Você não pode mais incluir vagas, pois ja existem 5 vagas por recrutamento";
	$tem_erros = true;

} else if (!empty($_POST) && count(array_filter($_POST, "trim")) == 0) {
	$msg_erro['vazia'] = "Por favor, preencha pelo menos uma entrada ";
	$tem_erros = true;

} else if (!empty($_POST) && count(array_filter($_POST, "trim")) != count(array_unique(array_filter($_POST, "trim")))) {
	$msg_erro['repetido'] = "Você digitou elementos repetidos";
	$tem_erros = true;
} else if (!empty($_POST) && conta_ocorrencias($_POST, $conexao)) {
	$msg_erro['repetido'] = "Esta vaga já está no banco de dados ";
	$tem_erros = true;
} else if (count(array_filter($_POST, "trim")) != 0 && !$tem_erros) {
	foreach ($_POST as $key => $value) {
		if (trim($value) != "") {
			inserir_vaga($conexao, $value);
		}
	}

	header('Location: index.php');
	die();
}

$vagas = buscar_vagas($conexao);
include "template_index.php";
?>