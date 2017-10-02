<?php 
include_once('logica.php');
$id 		= "";
$nome 		= "";
$email		= "";
$user	 	= "";
$senha 		= "";

if (isset($_POST['cadastrar'])) {
	$nome 		= ucwords($_POST['nome']);
	$email		= $_POST['email'];
	$user	 	= $_POST['usuario'];
	$senha 		= sha1($_POST['senha']);
	
	mysqli_query($conexao,"INSERT INTO usuario(nome, email, usuario, senha) VALUES('$nome','$email','$user','$senha')");
	
	$_SESSION['mensagem']	=	"Cadastro Realizado!";
	unset ($_POST['cadastrar']);
	header('location: adm.php');
}

if(isset($_POST['logar'])){
	if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
		$user	 	= $_POST['usuario'];
		$senha 		= sha1($_POST['senha']);

		$resultado	= mysqli_query($conexao,"SELECT * FROM usuario WHERE usuario='$user' AND senha='$senha'");
		$row = mysqli_num_rows($resultado);
			if($row == 1){
				header("Location: cadproduto.php");
			}else{
				$_SESSION['mensagem']	=	"Usuário ou senha inválido!";
				header("Location: adm.php");
			}
	}
}