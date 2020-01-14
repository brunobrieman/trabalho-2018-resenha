<?php


	function login ($email,$senha){
			$dados=file_get_contents('cadastro.json');
			$dados=json_decode($dados,true);
			foreach ($dados as $user) {
				if($user['senha']==$senha && $email==$user['email']){
					return $user['number'];
				}
			}
	}
//print_r(login('bruno.brieman@gmail.com',1231));

	function buscaUsuario($id){
			$dados=file_get_contents('cadastro.json');
			$dados=json_decode($dados,true);

			foreach ($dados as $user) {
				if($user['number']==$id){
					return $user;
				}
			}
	}

	function buscaresenhaCadastrada ($id){
		$dados = file_get_contents('resenhas.json');
		$dados=json_decode($dados,true);


			foreach ($dados as $dado) {
				if($dado['id']==$id){
					return $dado;
				}
			}		
	}

print_r(buscaresenhaCadastrada('5c0006f88884b'));
?>