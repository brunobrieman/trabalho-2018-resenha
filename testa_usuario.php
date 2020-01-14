<?php
session_start();
 include "funcoes.php"; 
 $dados=$_POST;
 
 //print_r($dados);


$id_usuario=login($dados['login'],$dados['senha']);


if(empty($id_usuario)){
	echo"<br> <h1>Usuario ou senha invalidos</h1>";
	echo '<meta http-equiv="refresh" content="1; url=index.php">
';
}else{

	$_SESSION['usuario_logado']=$id_usuario;

echo'
<center>
	<h1>Bem Vindo</h1>
<meta http-equiv="refresh" content="1; url=pag_usuario.php?id_usuario='.$id_usuario.'">
';
}
