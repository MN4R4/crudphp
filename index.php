<?php

	// previne o cache de pagina
	header("Expires: Mon, 21, Out 1999 00:00:00 GMT");
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
	// vamos declaras os dados do nosso banco de dados
	// host, username, pass, dbname
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "exemplo1";
	
	// vamos receber uma variavel chamada r que significa rota
	$r = $_GET['r'];
	require_once($r."/index.php");