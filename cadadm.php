<?php
	include_once('logica.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<title>Document</title>
</head>
<body>
	<?php #bloco de mensagem
		if (isset($_SESSION['mensagem'])):
	?>
		<div class="msg">
			<?php
				echo $_SESSION['mensagem'];
				unset ($_SESSION['mensagem']);
			?>
		</div>
	<?php
		endif #fim do bloco de mensagem
	?>
	<div class="adm-log">
		<div class="area-funcionario">
			<p>
				<h2>Cadastro de Funcionário</h2>
			</p>
		</div>
		<form class="form-adm" action="valida.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="input-grupo">
				<label for="idnome">Nome</label>
				<input type="text" name="nome" id="idnome" required>
			</div>
			<div class="input-grupo">
				<label for="idemail">Email</label>
				<input type="email" name="email" id="idemail" required>
			</div>
			<div class="input-grupo">
				<label for="usuario">Usuário</label>
				<input type="text" name="usuario" id="usuario" required>
			</div>
			<div class="input-grupo">
				<label for="password">Senha</label>
				<input type="password" name="senha" id="password" required>
			</div>
			<div class="input-grupo btn-comprar">
				<button class="btn"  type="submit" name="cadastrar">Cadastrar</button>
			</div>
		</form>
	</div>
</body>
</html>