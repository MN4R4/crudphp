<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pagina Principal</title>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="main.js"></script>
		<link rel="stylesheet" href="../css/stylesheet.css">
		<!-- A pasta de referencia para o css estara localizada no principal o caminho deve ser incluido -->
	</head>
	<body>
		<header>
			<h1>Cadastro Simples</h1>
		</header>

		<?php if(isset($retornoExc)) { ?>
			<h1 id="frase"><?=$retornoExc?></h1>
		<?php } ?>	
		<p id ="cadastro" ><a href="index.php?r=usuario&p=cadastrar">Cadastrar novo usuario</a></p>
		<table>
		<tr id="primlinha">
			<td>Id</td>
			<td>Nome</td>
			<td>Idade</td>
			<td>Excluir</td>
			<td>Alterar</td>
			<td>Inserir</td>
		</tr>
		
		<?php // prestar atenção no local onde se fechar o foreach que ficara no final
			foreach($dados as $linha){  ?>			
			<tr id="sql">
				<td><?=$linha['id']?></td>
				<td><?=$linha['nome']?></td>
				<td><?=$linha['idade']?></td>
				<!--no link não podera ser colocado o valor de id por questao de segurança-->
				<td><a href="index.php?r=usuario&p=excluir&codigo=<?=$linha['id']?>" onclick = "return confirm('Deseja realmente excluir o registro?')" id="delete" >Excluir</a></td>
				<!-- cada && representa uma condição que é usada como parametro p que é a variavel e cod que representa o id-->
				<td><a href="index.php?r=usuario&p=alterar&codigo=<?=$linha['id']?>" id="update" >Alterar</a></td>
				<td><a href="index.php?r=usuario&p=cadastrar" id="create" >Inserir</a></td>
			</tr>
		<?php } // final do foreach  ?>
		</table>
	<footer>
		<h3>Modelo de Cadastro</h3>
		<p>Todos os direitos reservados MN4R4 &copy; 2018</p>
	</footer>
	</body>
</html>