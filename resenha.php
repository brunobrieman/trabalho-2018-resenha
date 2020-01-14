<?php 

	//pega o id_resenha da url
    $id_resenha = $_GET['id_resenha'];

   $resenha_json  = file_get_contents('resenha.json');
    $resenhas_array = json_decode($resenha_json, true); 

   //abrir arquivo de curtidas
    $curtidas_json  = file_get_contents('curtidas.json');
    $curtidas_array = json_decode($curtidas_json, true); 

    foreach ($resenhas_array as $resenha){

        if($resenha['id_resenha'] == $id_resenha){
            $resenha_encontrada = $resenha;
        }
    }

  //ALGORITMO PARA CURTIR
    if (isset($_GET['acao']) and $_GET['acao'] == "curtir" ) {
    	
    	$curtida = [
	    	"id_usuario" => 1,
	    	"id_resenha" => $id_resenha
	    ];

	    $curtidas_array[] = $curtida;
	    $curtidas_json = json_encode($curtidas_array, JSON_PRETTY_PRINT);
	    file_put_contents("curtidas.json", $curtidas_json);
    }

  //ALGORITMO PARA DESCURTIR  
     if (isset($_GET['acao']) and $_GET['acao'] == "remover_curtir" ) {

    	foreach ($curtidas_array as $posicao => $curtida) {
    		
    		if ($id_resenha == $curtida['id_resenha']) {
    			unset($curtidas_array[$posicao]);
    		}
    	}

    	$curtidas_json = json_encode($curtidas_array, JSON_PRETTY_PRINT);
	    file_put_contents("curtidas.json", $curtidas_json);
    }


   //verificar se foi curtida
    $esta_curtido = false;
    foreach ($curtidas_array as $curtida) {
    	if ($id_resenha == $curtida['id_resenha']) {
    		$esta_curtido = true;
    	}
    };
?>


<?php include ('cabecalho.php');?>





<!--QUESTAO 7-->


<div class="container2">
  <!-- Full-width images with number text -->
  <div class="mySlides">
    <img src="img/<?=$resenha_encontrada['imagem2']?>" style="width:100%" > 
  </div>

  <div class="mySlides">
    
       <img src="img/<?=$resenha_encontrada['imagem3']?>" style="width:100%">
  </div>

  <div class="mySlides">
    
      <img src="img/<?=$resenha_encontrada['imagem4']?>" style="width:100%">
  </div>
</div>


  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <style type="text/css">
    .prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.container2 {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}
 
/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}
  </style>

  <br>
  <br>

 

  
</div>
<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>


















<div id="conteudo" class="container"
style="margin-right: 13%;">
    <div id="jogos" style="display: flex;">

        <iframe allow="autoplay; encrypted-media" allowfullscreen="" frameborder="0" width="60%" height="300" src="<?=$resenha_encontrada['video']?>"></iframe>
        <div style="width: 60%">


          <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Use an element to toggle between a like/dislike icon -->


          <script type="text/javascript">
            function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}
          </script>






            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nome do jogo: <?=$resenha_encontrada['nome'] ?></li>
                 <li class="list-group-item"> <?=$resenha_encontrada['resenha'] ?></li>
                                <li class="list-group-item">
                    
                    <?php if($esta_curtido == false): ?>
                        <a href="?id_resenha=<?= $id_resenha ?>&acao=curtir">curtir resenha!</a>
                    <?php else: ?>
                        <a href="?id_resenha=<?= $id_resenha ?>&acao=remover_curtir">remover curtir!</a>

                    <?php endif ?>

                </li>

            </ul>

        </div>

    </div>
</div>


</body>
</html>