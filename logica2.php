<?php
#iniciando sessao
session_start();

#conectando o banco de dados
$conexao	=	mysqli_connect('localhost','root', '', 'prova_fpf') or die(mysqli_error());

#iniciando variaveis
$produto		=	"";
$descricao		=	"";
$valor		=	"";
$id 		=	"";
$update		=	false;

#inserindo dados na tabela

if (isset($_POST['salvar'])) {
	$produto		=	ucwords($_POST['produto']);#Torna a primeira letra maiscula.
	$descricao		=	ucwords($_POST['descricao']);#Torna a primeira letra maiscula.
	$valor			=	$_POST['valor'];

	
	mysqli_query($conexao,"INSERT INTO produtos(produto, descricao, valor) VALUES('$produto','$descricao','$valor')");

	$_SESSION['mensagem']	=	"Dados salvos!";
	header('location: cadproduto.php');
}

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$produto		=	ucwords($_POST['produto']);#Torna a primeira letra maiscula.
	$descricao		=	ucwords($_POST['descricao']);#Torna a primeira letra maiscula.
	$valor			=	$_POST['valor'];
	
	mysqli_query($conexao,"UPDATE produtos SET produto='$produto', descricao='$descricao', valor='$valor' WHERE id=$id");
	$_SESSION['mensagem'] = "Dados Atualizados!";
	header('location: cadproduto.php');
}

	if(isset($_GET['del'])){
		$id = $_GET['id'];
		mysqli_query($conexao,"DELETE  FROM produtos WHERE id=$id");
		$_SESSION['mensagem'] = "Dados Deletado!";
		header('location: cadproduto.php');
	}

		#<?php
			if(isset($_POST['finalizar'])){
				$valorvenda = mysqli_query($conexao, "INSERT INTO vendas(valor) VALUES('$total')");

				$idvenda = mysqli_insert_id($valorvenda);

			foreach ($_SESSION['venda'] as $insertProduto => $qtde):
				$itenscompra = mysqli_query($conexao,"INSERT INTO itensvenda(idvenda, idproduto,qtde) VALUES('$idvenda','$insertProduto','$qtde')");

			endforeach;
							
				$_SESSION['mensagem']	=	"Compra finalizada!";
				header('location: carrinho.php');
			}

?>