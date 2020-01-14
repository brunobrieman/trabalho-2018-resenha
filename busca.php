<!--QUESTAO 1 a e b-->

	<?php

		$resenhas_json  = file_get_contents('resenha.json');

		$resenhas_array = json_decode($resenhas_json, true); 

		$resenhas_encontradas = []; //array();

		//Busca

		//verificar se o campo_busca nao esta vazio
		if (isset($_GET['campo_busca'])) {
			
			foreach ($resenhas_array as $resenha) {

				$nome  = strtolower($resenha['nome']);
				$busca = trim(strtolower($_GET['campo_busca']));

				if(  strpos($nome, $busca) !== false  ){
					$resenhas_encontradas[] = $resenha;
				}
			}
		}

	?>	

	

<?php require_once 'cabecalho.php'; ?>

<div id="conteudo" class="container">

	<h3>resultado da busca por: "<?= @$_GET['campo_busca'] ?>"</h3>

    <div id="jogos" class="row">


        <div class="col-md-12">


             <ul class="list-group list-group-flush">

                <?php foreach ($resenhas_encontradas as $resenha) : ?>


                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="img/<?= $resenha['imagem1'] ?>" width="100" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="col-md-8">
                            <a href="resenha.php?id_resenha=<?=$resenha['resenha'] ?>"> <?= $resenha['nome'] ?>  </a></br>
                            
                        </div>
                    </div>

                </li>

                <?php endforeach; ?>
            
            </ul>

        </div>

    </div>
</div>


</body>
</html>