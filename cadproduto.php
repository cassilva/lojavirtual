<?php
#iniciando sessao
#session_start();
	include_once('logica.php');
	
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
			<li class="bt-desk"><a class="active" href="cadproduto.php">Cadastrar Produtos</a></li>
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
			<th>Valor R$</th>
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