<?php


?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">



<div id="id01" class="modal">
  

    <?php

      ?>
      <div class="logar">

        <form method="post" action="testa_usuario.php" class="login">
          <label for="login">Login aqui</label>

          <input class="imput" type="text" name="login" placeholder="Entrar">
          <label for="senha">Senha</label>
          
          <input class="imput" type="password" name="senha" placeholder="Senha">

          <input class="entrar" type="submit" value="Entrar">
        </form>  
         </div>
        <?php
       
      
      ?>

    
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
