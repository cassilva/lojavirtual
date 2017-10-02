<?php  include('logica.php'); 

 #bloco de edicao dos dados
	if (isset($_GET['edit'])) {  #bloco de edicao dos dados
		$id = $_GET['edit'];
		$update = true;
		$registro = mysqli_query($conexao, "SELECT * FROM produtos WHERE id= $id ");

			if (count($registro) == 1 ) {
				$n = mysqli_fetch_array($registro);
				$produto = $n['produto'];
				$descricao = $n['descricao'];
				$valor = $n['valor'];
			}
	}
# fim do bloco de edicao dos dados
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<title>Prova</title>
</head>
<body>

	<?php # bloco de mensagem de fedback
	if (isset($_SESSION['mensagem'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['mensagem']; 
				unset($_SESSION['mensagem']);
			?>
		</div>
	<?php endif 
	# fim do bloco de mensagem de fedback
	?>

<?php #Inicio do bloco de Listagem de dados.
	$res = mysqli_query($conexao, "SELECT * FROM produtos"); 
?>

<table>

		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Endereço</th>
			<th colspan="2">Ação</th>
		</tr>

	
	<?php # laco de Listagem de dados.
		while ($row = mysqli_fetch_array($res)) { 
	?>
		<tr>
			<td><?php echo $row['produto']; ?></td>
			<td><?php echo $row['descricao']; ?></td>
			<td><?php echo $row['valor']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editar</a>
			</td>
			<td>
				<a href="logica.php?del=<?php echo $row['id']; ?>" class="del_btn">Deletar</a>
			</td>
		</tr>
	<?php # fim do laco de Listagem de dados.
		} 
	?>
</table>


	<form method="post" action="logica.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
		<div class="input-grupo">
			<label>Nome</label>
			<input type="text" name="produto" required value="<?php echo $produto; ?>" >
		</div>
		
		<div class="input-grupo">
			<label>E-mail</label>
			<input type="email" name="descricao" value="<?php echo $descricao; ?>">
		</div>
		
		<div class="input-grupo">
			<label>Endereco</label>
			<input type="text" name="valor" required value="<?php echo $valor; ?>" >
		</div>
		
		<div class="input-grupo">
			<?php # ativaçao do botao editar. (ver linha 62 e 6).
				if ($update == true): 
			?> 

				<button class="btn edt" type="submit" name="update"  >Editar</button>

			<?php 
				else: # ativaçao do botao salvar.
			?>

				<button class="btn" type="submit" name="salvar" >Salvar</button>

			<?php 
				endif # fim teste do botao editar/salva.
			?>

		</div>
	</form>
</body>
</html>