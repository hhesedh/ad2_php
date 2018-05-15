<!DOCTYPE html>
<html>
<head>
	<title>Atualizar vaga</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form method="POST">
		<?php if ($tem_erros && isset($msg_erro['vazia'])): ?>
			<span  style="color: #F44;"><?php echo $msg_erro['vazia']; ?></span>
		<?php endif;?>
		<input type="hidden" name="id" value="<?php echo $vetor_vaga['id']; ?>" />

		<fieldset>
			<legend>Atualizar Vaga</legend>
			<label>
				Vaga 1:
				<input type="text" name="nome" value="<?php echo $vetor_vaga['nome'] ?>">
			<input type="submit" value="Atualizar" class="botao">
		</fieldset>

	</body>
</html>