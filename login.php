<?php
	session_start();
	require_once 'Controlador.php';

	$control = new Controlador();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$tipo=$_POST['tipo'];
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$email=$_GET['email'];
		$senha=12345;
		$tipo=0;
	}

	$resp = $control->login($email, $senha, $tipo);
	if(is_null($resp)){
		$_SESSION['erro'] = "Erro! E-mail e/ou Senha incorretos!<br/>";
		header('Location: index.php#login');
	}else{
		$_SESSION['user'] = $resp;
		header('Location: painel.php');
	}
?>