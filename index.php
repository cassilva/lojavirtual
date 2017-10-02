<?php
	include_once('logica.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<title>Início</title>
</head>
<body>
	<nav>
		<ol>
			<li class="bt-desk"><a class="active" href="index.php">Inicio</a></li>
			<li class="bt-desk"><a href="carrinho.php">Carrinho</a></li>
		</ol>
	</nav>
	<main>
		
		

		<div class="produto">

		<?php
			$lista=mysqli_query($conexao,"SELECT * FROM produtos");
 #laco para listagem de dados 
		while ($row = mysqli_fetch_array($lista)) {
			$id = $row['id'];
		?>
		
		<a class="produto-exposto" href="carrinho.php?comprar=<?php echo $row['id']; ?>">
			<div >
				<img class="im" src="assets/img_produto/<?=$row->id;?>.jpg" />
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
			}
		?>
		</div>
	

	</main>
	
</body>
</html>