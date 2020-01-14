<?php 

 
include('cabecalho.php');?>
<br>
<br>
<?php
    

        //CADASTRAR-
        if ( isset($_GET['acao']) && $_GET['acao'] == 'cadastrar'){
        	$json = file_get_contents('resenhas.json');
        	$resenhas_array = json_decode($json);
            $novaresenha = [
                "nome"   => $_POST['nome'],
                "img"  => $_POST['img'],
                "comentario" => $_POST['comentario'],
                "id" => uniqid()
            ];

            //atualiza o array de contatos
            $resenhas_array[] = $novaresenha;

            //tbm atualiza o arquivo .json
            $json = json_encode($resenhas_array, JSON_PRETTY_PRINT);
            file_put_contents('resenhas.json', $json);
           

        }

       

?>
<center><h1>Cadastre uma Resenha</h1></center>
<form class="ui large form"  method='post' id="cadastro" action="?acao=cadastrar">
          <div class="ui stacked segment">
            
            <div class="field">
              <div class="ui left input">
                <input type="text" name="nome" placeholder="Titulo resenha">
              </div>
            </div>
            <div class="field">
              <div class="ui left input">
                <input type="file" name="img" placeholder="imagem jogo">
              </div>
            </div>
           <div class="field">
           	<div class="ui left input">
			<textarea class="input2s" form="cadastro" name="comentario" rows="15" cols="40" placeholder="Resenha"></textarea>
			</div>
			</div>
			 <center>
              <a href="index.php"><div class="ui negative basic button">cancelar</div></a>
              <button class="ui positive basic button" type="submit" style="width: 30%;">
              cadastrar

            </button>
            
            
          
      
</form>
   
</body>
