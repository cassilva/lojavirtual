<?php 
include_once('logica.php');
$id 		= "";
$nome 		= "";
$email		= "";
$user	 	= "";
$senha 		= "";
#cadastrando usuario
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
				
#login de usuario
$_SESSION['usuario'] = false;
if(isset($_POST['logar'])){
	if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
			$user	 	= $_POST['usuario'];
			$senha 		= sha1($_POST['senha']);

			$resultado	= mysqli_query($conexao,"SELECT * FROM usuario WHERE usuario='$user' AND senha='$senha'");
		$row = mysqli_num_rows($resultado);
			if($row == 1){
				$_SESSION['usuario'] = true;
				if ($_SESSION['usuario'] == true) {
					header("Location: cadproduto.php");
				}
				
			}else{
				$_SESSION['mensagem']	=	"Usuário ou senha inválido!";
				header("Location: adm.php");
			}
	}
}

#cadastro de clientes
if (isset($_POST['cadcliente'])) {
	$nome 		= ucwords($_POST['nome']);
	$email		= $_POST['email'];
	$user	 	= $_POST['cliente'];
	$senha 		= sha1($_POST['senha']);
						
	mysqli_query($conexao,"INSERT INTO clientes(nome, email, cliente, senha) VALUES('$nome','$email','$user','$senha')");
						
	$_SESSION['mensagem']	=	"Cadastro Realizado!";
	unset ($_POST['cadastrar']);
	header('location: login.php');
}						

#login de cliente
$_SESSION['cliente'] = false;
if(isset($_POST['logcliente'])){
	if((isset($_POST['cliente'])) && (isset($_POST['senha']))){
			$user	 	= $_POST['cliente'];
			$senha 		= sha1($_POST['senha']);

			$resultado	= mysqli_query($conexao,"SELECT * FROM clientes WHERE cliente='$user' AND senha='$senha'");
		$row = mysqli_num_rows($resultado);
			if($row == 1){
				$_SESSION['cliente'] = true;
				if ($_SESSION['cliente'] == true) {
					header("Location: index.php");
				}
				
			}else{
				$_SESSION['mensagem']	=	"Usuário ou senha inválido!";
				header("Location: login.php");
			}
	}
}