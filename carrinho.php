<?php
#iniciando sessao
#session_start();
	include_once('logica.php');
if($_SESSION['cliente'] == true){
	if(isset($_SESSION['venda'])){

	}else{
		$_SESSION['venda'] = array();
	}

#print_r($_SESSION['venda']);
	

	#deletando itens do carrinho
	if(isset($_GET['delcarrinho'])){
		$del = $_GET['delcarrinho'];
		unset($_SESSION['venda'][$del]);
	}

	#quando clica em 1 item
	if(@$_GET['comprar']){
		$produtovenda = $_GET['comprar'];
		$_SESSION['venda'] [$produtovenda] = 1;
	}
	#finalizando sessao
	if(@$_GET['sair']){
		$fim = session_destroy();
		header('location: index.php'); 
	}


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
			<li class="bt-desk"><a class="active" href="carrinho.php">Carrinho</a></li>
			<li class="bt-desk sair"><a  href="carrinho.php?sair=<?echo $fim;?>">Sair</a></li>
		</ol>
	</nav>
	<nav id="versao-mobile">
		<ol>
			<li class="bt-mobile"><a href="index.php">Inicio</a></li>
			<li class="bt-mobile"><a class="active" href="carrinho.php">Carrinho</a></li>
			<li class="bt-mobile sair"><a  href="carrinho.php?sair=<?echo $fim;?>">Sair</a></li>
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
				#itens do carrinho
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
<?php
}else{
	header('location: index.php');
}
?>