<?php
	// o model sera utilizado para guardar as funções do sql
	function usuario_listar($conexao){
		$sql = "SELECT id, nome, idade FROM usuario ORDER BY nome";
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	function usuario_Id($conexao,$id){
		$sql = sprintf("SELECT id, nome, idade FROM usuario WHERE id = %s",$id);
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	function usuario_excluir($conexao,$id_usuario){
		$sql = sprintf("DELETE FROM usuario WHERE id = %s",$id_usuario);
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	// a validação dos dados será realizada no model ( vai verificar se os dados colocados estão corretos)
	// o NULL na função deve ser colocado dentro de aspas simples
	function usuario_cadastrar($conexao,$usuario,$idade){
		if($usuario == ""){
			return false;
		} else if ($idade == "" ) {
			$idade = 'NULL';
		} else {
			$sql = sprintf("INSERT INTO usuario(nome,idade) VALUES ( '%s' , %s )", $usuario, $idade);
			// vai mostrar o erro de conexão do resultado - or die (mysql_error())
			$resultado = mysqli_query($conexao,$sql);
			return $resultado;
		}
	}

	function usuario_alterar($conexao,$usuario,$idade,$id){
		if($usuario == ""){
			return false;
		} else if ($idade == "" ) {
			$idade = 'NULL';
		} 
		$sql = sprintf("UPDATE usuario SET nome = '%s',idade = %s WHERE id = %s", $usuario, $idade, $id);
		// vai mostrar o erro de conexão do resultado - or die (mysql_error())
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
		
	}
	