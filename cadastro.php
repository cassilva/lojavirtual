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

	<script>
		
		function abre_fecha(n){
			minhadiv= document.getElementById('versao-mobile');
			botao=document.getElementById('botao');
			if (n==1) {
				minhadiv.style.height='135px';
				botao.href='javascript: abre_fecha(0)';
			}else{
				minhadiv.style.height='0';
				botao.href='javascript: abre_fecha(1)';
			}
		}
	</script>
</head>
<body>
	<header>
		<p class="nome-loja">
			Store
		</p>
	</header>
	<nav class="versao-desk">
		<a href="javascript: abre_fecha(1);"   id="botao"><img src="assets/imagens/menu.png" width="30px"/></a>
		<ol>
			<li class="bt-desk"><a href="index.php">Inicio</a></li>
			<li class="bt-desk"><a class="active" href="cadastro.php">Cadastre-se</a></li>
			<li class="bt-desk"><a href="login.php">Entrar</a></li>
		</ol>
	</nav>
	<nav id="versao-mobile">
		<ol>
			<li class="bt-mobile"><a href="index.php">Inicio</a></li>
			<li class="bt-mobile"><a class="active" href="cadastro.php">Cadastre-se</a></li>
			<li class="bt-mobile"><a href="login.php">Entrar</a></li>
		</ol>
	</nav>

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
		<div class="area-cliente">
			<p>
				<h2>Cadastre-se</h2>
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
				<input type="text" name="cliente" id="usuario" required>
			</div>
			<div class="input-grupo">
				<label for="password">Senha</label>
				<input type="password" name="senha" id="password" required>
			</div>
			<div class="input-grupo btn-comprar">
				<button class="btn edt"  type="submit" name="cadcliente">Cadastrar</button>
			</div>
		</form>
	</div>
</body>
</html>