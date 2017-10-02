<?php
	include_once('logica.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
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
			<li class="bt-desk"><a href="cadastro.php">Cadastre-se</a></li>
			<li class="bt-desk"><a class="active" href="login.php">Entrar</a></li>
		</ol>
	</nav>
	<nav id="versao-mobile">
		<ol>
			<li class="bt-mobile"><a href="index.php">Inicio</a></li>
			<li class="bt-mobile"><a href="cadastro.php">Cadastre-se</a></li>
			<li class="bt-mobile"><a class="active" href="login.php">Entrar</a></li>
		</ol>
	</nav>
	<div class="adm-log">
		<div class="area-cliente">
			<p>
				<h2>Faça seu login</h2>
			</p>
		</div>
		<form class="form-adm" action="valida.php" method="post">
			<div class="input-grupo">
				<label for="idusuario">Usuário</label>
				<input type="text" name="cliente" id="idusuario" required>
			</div>
			<div class="input-grupo">
				<label for="idpassword">Senha</label>
				<input type="password" name="senha" id="idpassword" required>
			</div>
			<div class="input-grupo btn-comprar">
				<button class="btn edt"  type="submit" name="logcliente"> Login </button>
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