<?php 
include "cabecalho.php";
include 'funcoes.php';
	$lista_resenhas = file_get_contents('resenhas.json');

	$lista_resenhas = json_decode($lista_resenhas,true);

	 if ($_GET['acao'] == 'excluir'){
//            echo 'tentou excluir o ' . $_GET['numero'];

            //Percorre a lista, um a um, e atribui os dados do contato a
            //variavel $contato e posicao do contato a variavel $pos
            foreach ($lista_resenhas as $pos => $resenha) {

                if ($resenha['id'] == $_GET['id']){
                    unset( $lista_resenhas[$pos] );
                    break;
                }
            }

            $json = json_encode($lista_resenhas, JSON_PRETTY_PRINT);
            file_put_contents('resenhas.json', $json);
        }

?>





<section class="row galeria">	
	<img src="img/avatar.png" class="foto_usuario rounded-circle col-lg-2">
</section>



<div class="divisor"></div>

<hr></hr>

<h3 class="mihas_resenhas_usu">Minhas resenhas</h3>

<div class="divisor"></div>

<a href="cadatro_resenha.php"><button class="animated fadeInUp btn btn-outline-primary"> "cadastrar resenha"</button>;



 <?php 
            $cont = 0;
            foreach ($lista_resenhas as $resenhas):
            	$cont++;
    			if ($cont>3) {
        			break;
    			}else{
           ?>
            <div id="jogador" class="col-sm-3 mb-5 lado_usuario">

				<div  class="card">


                    <!--QUESTAO 4-->
					<img class="card-img-top" src="img/<?= $resenhas['img']?>" >
					<div class="card-body">
						<!--  Nome atleta -->
						<h5 class="card-title"><?= $resenhas['nome'] ?></h5>
					</div>

					<!-- Caracteristicas do Jogador -->
					

					</ul>
					<div class="card-body">
                        <!--QUESTAO 5-->
						<a href="resenha.php?id_resenha=<?= $resenhas['id_resenha'] ?>" class="card-link"> Ver</a>

						<a href="resenha.php?id_resenha=<?= $resenhas['id_resenha'] ?>" class="card-link">Editar</a>

						<a href="?acao=excluir&id=<?= $resenhas['id'] ?>" class="card-link">Excluir</a>
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
	