<?php
include 'cabecalho.php';


/*A funcao file_get_contents obtem os dados do arquivo contatos.json e
atribui seu conteudo a variavel $contato_json*/
$contatos_json  = file_get_contents('cadastro.json');

/*Transforma o texto da variavel $contatos_json em um array associativo*/
$contatos_array = json_decode($contatos_json, true);

function salvar_contatos_agenda($parametro_array_contatos){
  $json = json_encode($parametro_array_contatos, JSON_PRETTY_PRINT);
  file_put_contents('cadastro.json', $json);
}

function buscarContato(){
        //TODO
}

function buscarContatos(){
        //TODO
}


    //is set - verifica se existe $_GET['acao'] (na url)
if ( isset($_GET['acao']) ){

        //CADASTRAR
  if ( $_GET['acao'] == 'cadastrar'){

    $novoContato = [
      "nome"   => $_POST['nome'],
      "email"  => $_POST['email'],
      "apelido"   => $_POST['apelido'],
      "senha"   => $_POST['senha'],
      "confirmarSenha"   => $_POST['confirmarSenha'],
      "dataNascimento"   => $_POST['dataNascimento'],

      "number" => uniqid()
    ];

            //atualiza o array de contatos
    $contatos_array[] = $novoContato;

            //tbm atualiza o arquivo .json
            //$json = json_encode($contatos_array, JSON_PRETTY_PRINT);
            //file_put_contents('contatos.json', $json);
    salvar_contatos_agenda($contatos_array);

  }

        //DELETE
  if ($_GET['acao'] == 'excluir'){
//            echo 'tentou excluir o ' . $_GET['numero'];

            //Percorre a lista, um a um, e atribui os dados do contato a
            //variavel $contato e posicao do contato a variavel $pos
    foreach ($contatos_array as $pos => $contato) {

      if ($contato['number'] == $_GET['numero']){
        unset( $contatos_array[$pos] );
        break;
      }
    }

    $json = json_encode($contatos_array, JSON_PRETTY_PRINT);
    file_put_contents('cadastro.json', $json);
  }

        //UPDATE
  if ($_GET['acao'] == 'editar'){
    echo 'tentou editar o ' . $_GET['numero'];
    foreach ($contatos_array as $contato) {
      if ($_GET['numero'] == $contato['number']){

        $contatoEncontrado = $contato;
        break;
      }
    }
        }//fim do if editar

        if ($_GET['acao'] == 'salvar_contato_editado'){

          foreach ($contatos_array as $pos => $contato){

            if ($_POST['campo_numero'] == $contato['number']){

              $contatos_array[$pos]['nome'] = $_POST['campo_editar_nome'];
              $contatos_array[$pos]['email'] = $_POST['campo_editar_email'];
              $contatos_array[$pos]['apelido'] = $_POST['campo_editar_apelido'];
              $contatos_array[$pos]['senha'] = $_POST['campo_editar_email'];
              $contatos_array[$pos]['confirmarSenha'] = $_POST['campo_editar_email'];
              $contatos_array[$pos]['dataNascimento'] = $_POST['campo_editar_nome'];
              
              break;
            }
          }

            //tbm atualiza o arquivo .json
          $json = json_encode($contatos_array, JSON_PRETTY_PRINT);
          file_put_contents('cadastro.json', $json);

        }



      }
      ?>

      <body>

        
        <br>
        <h3>Cadastre-se</h3>

        <form method="post" action="?acao=cadastrar">


          <div class="ui stacked segment">
            <div class="field">
              <div class="ui left input">
                <input type="text" name="nome" placeholder="Nome">
              </div>
            </div>


            <div class="field">
              <div class="ui left input">
                <input type="email" name="email" placeholder="E-mail">
              </div>
            </div>


            <div class="field">
              <div class="ui left input">
                <input type="text" name="apelido" placeholder="apelido">
              </div>
            </div>



            <div class="field">
              <div class="ui left input">
                <input type="password" name="senha" placeholder="Senha">
              </div>
            </div>



            <div class="field">
              <div class="ui left input">
                <input type="password" name="confirmarSenha" placeholder="Confirmação da Senha">
              </div>
            </div>



            
            <div class="field">
              <div class="ui left input">
                <input type="date" name="dataNascimento" placeholder="Data de nascimento">
              </div>
            </div>
            
            
            
            
               <a href="index.php"><div class="ui negative basic button">cancelar</div></a>
              <button class="ui positive basic button" type="submit" style="width: 30%;">
              cadastrar

            
            </div>
          </div>
        </body>

        </html>





        
        