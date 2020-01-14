<!--QUESTAO 6-->

<?php 

    $json = file_get_contents('curtidas.json');
    $curtidas_array = json_decode($json, true);

    $resenhas_json  = file_get_contents('resenha.json');
    $resenhas_array = json_decode($resenhas_json, true); 

    $ranking = [];

    foreach ($resenhas_array as $posicao => $resenha) {
        $numero_curtidas = 0;

        //verifica o numero de curtidas
        foreach ($curtidas_array as $pos => $curtida) {
            if ($resenha['id_resenha'] == $curtida['id_resenha']) {
                $numero_curtidas++;
            }
        }

        $resenha['numero_curtidas'] = $numero_curtidas;
        $ranking[] = $resenha;
    }


    function ordenar_curtidas($resenha, $outra_resenha) {
        return $resenha['numero_curtidas'] < $outra_resenha['numero_curtidas'];
    }
    
    usort($ranking, 'ordenar_curtidas');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nome do Site</title>

    <!--REPITA A QUESTAO 2-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php require_once 'menu.php'; ?>



<div id="conteudo" class="container">

    <h3>Ranking de Resenhas mais curtidos</h3>

    <div id="jogos" class="row">
        <div class="col-md-12">
             <ul class="list-group list-group-flush">

                <?php foreach ($ranking as $resenha) : ?>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="img/<?= $resenha['imagem1'] ?>" width="100" class="img-fluid" alt="Responsive image">
                            </div>
                            <div class="col-md-8">
                                <a href="resenha.php?id_resenha=<?=$resenha['id_resenha'] ?>"> <?= $resenha['nome'] ?>  </a></br>
                                <p>a página da resenha foi curtida <?= $resenha['numero_curtidas']?> vez(es)</p>
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