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
	<header>
		<p class="nome-loja">
			Store
		</p>
	</header>
	<div class="adm-log">
		<div class="area-restrita">
			<p>
				<h2>Área Restrita</h2>
			</p>
		</div>
		<form class="form-adm" action="valida.php" method="post">
			<div class="input-grupo">
				<label for="idusuario">Usuário</label>
				<input type="text" name="usuario" id="idusuario" required>
			</div>
			<div class="input-grupo">
				<label for="idpassword">Senha</label>
				<input type="password" name="senha" id="idpassword" required>
			</div>
			<div class="input-grupo btn-comprar">
				<button class="btn"  type="submit" name="logar"> Login </button>
			</div>
		</form>
		<?php #bloco de mensagem
			if (isset($_SESSION['mensagem'])):
		?>
		<div class="msg-erro">
			<?php
				echo $_SESSION['mensagem'];
				unset ($_SESSION['mensagem']);
			?>
		</div>
		<?php
			endif #fim do bloco de mensagem
		?>
	</div>
</body>
</html>