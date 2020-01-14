<?php 
 include('cabecalho.php');
 include('funcoes.php');
	$lista_resenhas = file_get_contents('resenha.json');

	$lista_resenhas = json_decode($lista_resenhas,true);
?>




            <div class=page>

   
     
       <br>
       <br>
        <center>
         <h1 class="animated fadeInLeftBig tituloIndex"> BWP Resenhas Esportivas</h1>
               	<br>
               	<br>
               	<h1 class="animated fadeInRightBig subtituloIndex">Resenhas esportivas da melhor qualidade</h1>
               <h1 class="animated fadeInLeftBig subtitulo2Index">entre para uma melhor experiencia</h1>
             	<br>

              <?php include 'parte.php'; 

              if(isset($_SESSION['usuario_logado'])){

              	$dados=buscaUsuario($_SESSION['usuario_logado']);


              	echo"<center>
              		
              			<a href='pag_usuario.php'><button class='animated fadeInUp btn btn-outline-primary'> perfil</button>;</a>
              			
              		</center>";
              }else{


              ?>


                <button class="animated fadeInUp btn btn-outline-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Entrar</button>
                <a href="cadastro.php"><button class="animated fadeInUp btn btn-outline-primary "style="width:auto">Cadastre-se</button></a>
               
                <link href="css/bootstrap.min.css" rel="stylesheet">
               <?php
           }
               ?>
     	<section class="animated shake colunaSeta">
     	<a href="#tituloNew"><img class="seta" src="img/seta.jpg"></a>
     	   </center>
     	</section>
   </div>
<div>
	<br>
	<br>
	<br>

	<div id="conteudo" class="container">
		<div id="jogos" class="row">

            <!--QUESTAO 3-->







            <?php 
            $cont = 0;
            foreach ($lista_resenhas as $resenhas):
            	$cont++;
    			if ($cont>4) {
        			break;
    			}else{
           ?>
            <div id="jogador" class="col-sm-3 mb-5">

				<div  class="card">


                    <!--QUESTAO 4-->
					<img class="card-img-top" src="img/<?= $resenhas['imagem1']?>" >
					<div class="card-body">
						<!--  Nome atleta -->
						<h5 class="card-title"><?= $resenhas['nome'] ?></h5>
					</div>

					<!-- Caracteristicas do Jogador -->
					

					</ul>
					<div class="card-body">
                        <!--QUESTAO 5-->
						<a href="resenha.php?id_resenha=<?= $resenhas['id_resenha'] ?>" class="card-link">saiba +</a>
					</div>
				</div>
			</div>
		<?php };
	endforeach;
		 ?>

		</div>
	</div>

	
</body>
</html>
	