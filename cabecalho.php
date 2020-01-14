<?php
session_start();
//echo $_SESSION['usuario_logado'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nome do Site</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="Semantic/semantic.css">
	<link rel="stylesheet" type="text/css" href="css/trabalho.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_personalizado.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="bg-light">
	<div class="container" style="width: 100%;">	

		<nav class="navbar navbar-expand-lg navbar-light bg-light ">

			<img src="img/logo.png" width="30" height="30" alt="">

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto ">
					
					<li class="nav-item">
						<a class="nav-link" href="index.php">Início</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Todas_resenhas.php">Resenhas</a>
					</li>
                    <li class="nav-item" >
                        <a class="nav-link" href="ranking.php">Ranking</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="busca.php">Buscar</a>
                    </li>

				</ul>

				<form method="get" action="busca.php" class="form-inline my-2 my-lg-0">
	
					<input class="form-control mr-sm-2" type="text" name="campo_busca">
					<input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="buscar">

				</form>

<?php


	if(isset($_SESSION['usuario_logado'])){
echo'
				<a href="logout.php">
				<input class="logout" type="button" value="logout";>
				</a>
	';		
}

?>
			</div>
		</nav>
	</div>
</div>	
