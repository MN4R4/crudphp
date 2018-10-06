<?php

	// as 4 variaveis estavam no index mas devem ser colocadas no controller para acessar o bd
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "exemplo1";

	$conexao = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	
	// vai verificar primeiro se conectou
	if (mysqli_connect_errno($conexao)){
		echo "A conexão falhou".mysqli_connect_error();
		exit();
	}

	// vai solicitar uma requisição para o model
	require('model.php');

	if(isset($_GET['p'])){
		$passo = $_GET['p'];
	} else {
		$passo = null;
	}

	// qual será a view que sera carregada
	// será criada uma variavel para saber o que será feito cadastrar, incluir, excluir, listar
	switch($passo){
		case "alterar":
			alterarUsuario($conexao);
			break;
		case "cadastrar":
			// funçao para mostra o cadastro
			cadastrarUsuario($conexao);
			break;
		case "excluir":
			//chamara a funcao excluir o usuario
			$retornoExc = excluirUsuario($conexao);
			$dados = listarDados($conexao);
			require("view_lista.php");
			break;
		default:
			$dados = listarDados($conexao);
			require("view_lista.php");
			break;			
	}
	
	// essa função ira mostrar os valores da tabela que estão disponiveis;
	function listarDados($conexao){
		$resultado = usuario_listar($conexao);
		$data = array();
		while($row = mysqli_fetch_array($resultado)){
			$data[] = array("id" => $row['id'],"nome" => $row['nome'],"idade" => $row['idade']);
		}
		return $data;
	}

	function excluirUsuario($conexao){
		$id_usuario = (isset($_GET["codigo"])) ? $_GET["codigo"] : null ; 
		$resultado = usuario_excluir($conexao,$id_usuario);
		if($resultado){
			return "Exclusao efetuda com sucesso!!!";
			$dados = listarDados($conexao);
			require("view_lista.php");
		} else {
			return " ";
		}
	}

	function cadastrarUsuario($conexao) {
		// verificar se o formulario foi postado
		if(isset($_POST['cadastro'])){
			// caso não entre no programa
			$usuario = $_POST['txtNomeUsuario'];
			$idade = $_POST['txtIdadeUsuario'];
			if(usuario_cadastrar($conexao,$usuario,$idade)){
				$retornoExc = "Usuario Cadastrado com sucesso!!!";
				$dados = listarDados($conexao);
				require("view_lista.php");
			} else {
				$retornoExc = "O cadastro falhou. Tente novamente.";
				require("view_newcadastro.php");
			}

		} else{
			// se não entrar vai mostrar essa view
			require("view_newcadastro.php");
		} 

	}

	function alterarUsuario($conexao){

		$titulo = "Alterar usuario";

		if(isset($_POST['idusuario'])){
			$usuario = $_POST['txtNomeUsuario'];
			$idade = $_POST['txtIdadeUsuario'];
			$id = $_POST['idusuario'];
			if(usuario_alterar($conexao,$usuario,$idade,$id)){
				$retornoExc = "Usuario alterado com sucesso!!!";
				$dados = listarDados($conexao);
				require("view_lista.php");
			} else {
				echo "A alteracao nao pode ser realizada. Tente novamente.";
			}
		}
		
		if(isset($_POST['idusuario'])){
			$id = $_POST['idusuario'];
		} else {
			$id = $_GET['codigo'];
		}
		
		$retorno = usuario_Id($conexao,$id);

		if(!$retorno){
			echo "Erro em buscar o usuario por id.";
			return false;
		} else {
			$dadosUsuario = mysqli_fetch_row($retorno);
			$dados = array("id"=>$dadosUsuario[0],"nome" => $dadosUsuario[1],"idade" =>$dadosUsuario[2]);
			require("view_alterarcadastro.php");
		}
		
	}

	mysqli_close($conexao);