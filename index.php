<?php
	include_once('logica.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<title>Início</title>


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
			<li class="bt-desk"><a class="active" href="index.php">Inicio</a></li>
			<li class="bt-desk"><a href="cadastro.php">Cadastre-se</a></li>
			<li class="bt-desk"><a href="login.php">Entrar</a></li>
		</ol>
	</nav>
	<nav id="versao-mobile">
		<ol>
			<li class="bt-mobile"><a class="active" href="index.php">Inicio</a></li>
			<li class="bt-mobile"><a href="cadastro.php">Cadastre-se</a></li>
			<li class="bt-mobile"><a href="login.php">Entrar</a></li>
		</ol>
	</nav>
<!-- 	<?php #bloco de mensagem
		#if (isset($_SESSION['cliente'])):
	?>-->
		<div class="msgnula">
			<?php
			#	echo "";
			?>
		</div>
<!--<?php
		#else:
	?>
		<div class="msg">
			<?php
				#echo "Para efetuar compras é necessário está logado!";
			?>
		</div>
	<?php
		#endif; #fim do bloco de mensagem
	?> -->
	<main>
		
		

		<div class="produto">

		<?php
			$lista=mysqli_query($conexao,"SELECT * FROM produtos");
 #laco para listagem de dados 
		while ($row = mysqli_fetch_array($lista)) {
			$id = $row['id'];
		?>
		<?php 
			if(@$_SESSION['cliente'] == true):
		?>
		<a class="produto-exposto" href="carrinho.php?comprar=<?php echo $row['id']; ?>">
			<div >
				<h2>  <?php echo $row['produto']; ?></h2>
				<div class="descricao">
					<p class="texto-descricao">
						<?php echo $row['descricao'];?>
					</p>
					<p class="texto-valor">
						<?php echo 'Preço: R$ '.number_format($row['valor'],2,',','.').'';?>
					</p>
				</div>
			</div>
		</a>
		<?php 
			else:
			?>
					<a class="produto-exposto" href="login.php">
			<div >
				<h2>  <?php echo $row['produto']; ?></h2>
				<div class="descricao">
					<p class="texto-descricao">
						<?php echo $row['descricao'];?>
					</p>
					<p class="texto-valor">
						<?php echo 'Preço: R$ '.number_format($row['valor'],2,',','.').'';?>
					</p>
				</div>
			</div>
		</a>
		<?php
			endif;
		?>
		<?php
			}
		?>
		</div>
	

	</main>
	
</body>
</html>