<?php
#iniciando sessao
#session_start();
	include_once('logica.php');

	if(isset($_SESSION['venda'])){

	}else{
		$_SESSION['venda'] = array();
	}

#print_r($_SESSION['venda']);
	


	if(isset($_GET['delcarrinho'])){
		$del = $_GET['delcarrinho'];
		unset($_SESSION['venda'][$del]);
	}

	
	if(@$_GET['comprar']){
		$produtovenda = $_GET['comprar'];
		$_SESSION['venda'] [$produtovenda] = 1;
	}

	if(@$_GET['sair']){
		$fim = session_destroy();
		header('location: carrinho.php'); 
	}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<title>Document</title>
</head>
<body>
	<nav>
		<ol>
			<li class="bt-desk"><a href="index.php">Inicio</a></li>
			<li class="bt-desk"><a class="active" href="carrinho.php">Carrinho</a></li>
			<li class="bt-desk sair"><a  href="carrinho.php?sair=<?echo $fim;?>">Sair</a></li>
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
	<main>
		<form action="logica.php" method="post">
			<div class="lista-produto">
				<table class="tabela-produto">
					
							<tr>
								<th>Produto</th>
								<th>Descrição</th>
								<th>Qtde</th>
								<th>Valor</th>
								<th>Ação</th>
							</tr>
				<?php
					foreach ($_SESSION['venda'] as $prod => $qtde):
						$dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$prod");
						$res = mysqli_fetch_assoc($dados);
				?>	
							<tr>
								<td>
									<?php echo $res['produto']; ?>
								</td>
								<td>
									<?php echo $res['descricao'];?>
								</td>
								<td><?php echo $qtde; ?>
								</td>
								<td>
									<?php echo ''.number_format($res['valor'],2,',','.').'';?>
								</td>
								<td><a href="carrinho.php?delcarrinho=<?php echo $res['id']; ?>" class="btn-del"> 
								Remover</a>
								</td>
							</tr>
					<?php
						@$total += $res['valor'] * $qtde;
						endforeach;
					?>  
							<tr>
								<td colspan="5" class="total">Total:<?php echo ' ' .number_format(@$total,2,',','.');?> </td>
							</tr>
				</table>
			
				<div class="btn-comprar">
					<button class="btn edt"  type="button" name="contcompra" onclick="location.href='index.php'">Continuar comprando</button>
					<button class="btn"  type="submit" name="finalizar">Finalizar compra</button>
				</div>			
			</div>
		</form>
	</main>
	
</body>
</html>