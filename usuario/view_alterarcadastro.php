<html>
	<head>
		<title>Alteracao de Cadastro</title>
		<title>Pagina Principal</title>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="main.js"></script>
		<link rel="stylesheet" href="../css/stylesheet.css">
	</head>
	<body>
		<header>
			<h1>Alteracao dos dados usuario</h1>
		</header>
		<form method="POST" action="index.php?r=usuario&p=alterar">
			<p id="usu">Nome do usuario</p>
			<p id="box"><input type="text" maxlength="120" name="txtNomeUsuario" value="<?=$dados['nome']?>"/></p>
			<p id="usu">Idade</p>
			<p id="box"><input type="text" maxlength="120" name="txtIdadeUsuario" value="<?=$dados['idade']?>"/></p>
			<p id="box"><input type="submit" value="alterar"/></p>
			<input type="hidden" name="idusuario" value="<?=$dados['id']?>"/>
		</form>
		<footer>
			<h3>Modelo de Cadastro</h3>
			<p>Todos os direitos reservados MN4R4 &copy; 2018</p>
		</footer>
	</body>
</html>