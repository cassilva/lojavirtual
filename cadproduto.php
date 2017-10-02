<?php
#iniciando sessao
#session_start();
	include_once('logica.php');
if($_SESSION['usuario'] == true){	
	if(isset($_GET['del'])) {
		$id 	= $_GET['del'];
		$delete = true;
		$dados = mysqli_query($conexao,"SELECT * FROM produtos WHERE id=$id");

			if(count($dados)==1){
				$delp = mysqli_fetch_array($dados);
				$produto 	= $delp['produto'];
				$descricao 	= $delp['descricao'];
				$valor 	= $delp['valor'];
			}
	}
	#bloco de edicao de dados
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$dados = mysqli_query($conexao,"SELECT * FROM produtos WHERE id=$id");

			if (count($dados)==1) {
				$up = mysqli_fetch_array($dados);
				$produto 	= $up['produto'];
				$descricao 	= $up['descricao'];
				$valor 	= $up['valor'];

			}
	}#fim do bloco de edicao
	#sair
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
			<li class="bt-desk"><a class="active" href="cadproduto.php">Cadastrar Produtos</a></li>
				<li class="bt-desk sair"><a  href="cadproduto.php?sair=<?echo $fim;?>">Sair</a></li>
		</ol>
	</nav>
	<nav id="versao-mobile">
		<ol>
			<li class="bt-mobile"><a href="index.php">Inicio</a></li>
			<li class="bt-mobile"><a class="active" href="cadproduto.php">Cadastrar Produtos</a></li>
				<li class="bt-mobile sair"><a  href="cadproduto.php?sair=<?echo $fim;?>">Sair</a></li>
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

	<?php #inicio do bloco de listagem
		$lista=mysqli_query($conexao,"SELECT * FROM produtos");
	?>

	<table>
		<tr>
			<th>Produto</th>
			<th>Descrição</th>
			<th>Valor</th>
			<th colspan="2">Ação</th>
		</tr>
	<?php #laco para listagem de dados 
		while ($row = mysqli_fetch_array($lista)) {
		
	?>
		<tr>
			<td><?php echo $row['produto']; ?></td>
			<td><?php echo $row['descricao']; ?></td>
			<td><?php echo number_format($row['valor'],2,',','.'); ?></td>
			<td><a href="cadproduto.php?edit=<?php echo $row['id']; ?>" class="btn-edit">Editar</a></td>
			<td><a href="cadproduto.php?del=<?php echo $row['id']; ?>" class="btn-del">Excluir</a></td>
		</tr>
	<?php # fim do laco de Listagem de dados.
		} 
	?>
	</table>


	<form action="logica.php" method="post" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-grupo">
			<label for="idproduto">Produto</label>
			<input type="text" name="produto" id="idproduto" required value="<?php echo $produto; ?>">
		</div>

		<div class="input-grupo">
			<label for="iddescricao">Descrição</label>
			<input type="text" name="descricao" id="iddescricao" required value="<?php echo $descricao; ?>">
		</div>

		<div class="input-grupo">
			<label for="idvalor">Valor</label>
			<input type="text" name="valor" id="idvalor" required value="<?php echo $valor; ?>">
		</div>
		<!-- <div class="input-grupo foto">
			<label for="idfoto">Foto</label>
			<input type="file" name="foto" id="idfoto" value="<?php echo $id; ?>">
		</div> -->


		<div class="input-grupo">
			<?php
				if($update == true):
			?>
				<button class="btn edt"  type="submit" name="update">Editar</button>
			<?php
				elseif($delete == true):
			?>
			<button class="btn del"  type="submit" name="delproduto">Excluir</button>
			<?php
				else:
			?>
				<button class="btn"  type="submit" name="salvar">Salvar</button>
			<?php
				endif
			?>
			
		</div>
	</form>
	
</body>
</html>
<?php
}else{
	header('location: adm.php');
}
?>