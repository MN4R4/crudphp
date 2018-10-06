<html>
	<head>
		<title>Novo cadastro</title>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="main.js"></script>
		<link rel="stylesheet" href="../css/stylesheet.css">
	</head>
	<body>
		<header>
			<h1>Cadastro de novo usuario</h1>
		</header>	
		<form method="POST" action="index.php?r=usuario&p=cadastrar">
			<p id="usu">Nome do usuario</p>
			<p id="box"><input type="text" maxlength="120" name="txtNomeUsuario"/></p>
			<p id="usu">Idade</p>
			<p id="box"><input type="text" maxlength="120" name="txtIdadeUsuario"/></p>
			<p id="box"><input type="submit" value="cadastrar"/></p>
			<input type="hidden" name="cadastro"/>
		</form>
		<footer>
			<h3>Modelo de Cadastro</h3>
			<p>Todos os direitos reservados MN4R4 &copy; 2018</p>
		</footer>
	</body>
</html>