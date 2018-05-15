<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<h1>Cadastramento de Vagas</h1>
	<form method="POST">
		<label>
			<?php if ($tem_erros && isset($msg_erro['limite'])): ?>
				<span  style="color: #F44;"><?php echo $msg_erro['limite']; ?></span>
			<?php endif;?>
			<?php if ($tem_erros && isset($msg_erro['vazia'])): ?>
				<span  style="color: #F44;"><?php echo $msg_erro['vazia']; ?></span>
			<?php endif;?>
			<?php if ($tem_erros && isset($msg_erro['repetido'])): ?>
				<span  style="color: #F44;"><?php echo $msg_erro['repetido']; ?></span>
			<?php endif;?>
		</label>
		<fieldset>
			<legend>Vagas</legend>
			<label>
				Vaga 1:
				<input type="text" name="vaga_1">
			</label>
			<label>
				Vaga 2:
				<input type="text" name="vaga_2">
			</label>
			<label>
				Vaga 3:
				<input type="text" name="vaga_3">
			</label>
			<label>
				Vaga 4:
				<input type="text" name="vaga_4">
			</label>
			<label>
				Vaga 5:
				<input type="text" name="vaga_5">
			</label>
			<input type="submit" value="Cadastrar"  class="botao">
		</fieldset>
		<table>
			<tr>
				<th>Vagas</th>
				<th>Opções</th>
			</tr>
			<?php foreach ($vagas as $key => $value): ?>
			<tr style="text-align:center;">
				<td>
					<h4><?php echo $value['nome']; ?></h4>
				</td>
				<td>
					<h4>
					<a href="editar.php?id=<?php echo $value['id']; ?>">
						Editar
					</a>
					<a href="remover.php?id=<?php echo $value['id']; ?>">
						Remover
					</a>
					</h4>
				</td>
			</tr>
			<?php endforeach;?>
		</table>
	</body>
</html>