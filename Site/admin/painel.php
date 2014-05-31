<?php
	ob_start();
    session_start();
    include("include/funcoes.php");
	if(!valida_sessao($_SESSION["user_id"]))
       {
          header("location:index.php");
          exit();
       } // Fim do comando if
    
	//<!-------------- Import Classes e Funcoes ------------------------------------------------ >
	require_once("conexao.php");
	require_once("include/banco.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="Tiago" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    	<script src="css/js/bjqs-1.3.js"></script>
    	<script src="css/js/bjqs-1.3.min.js	"></script>
    	<script src="css/js/libs/jquery.secret-source.min.js	"></script>
	</head>

	<body>
		<div id="container">
			<?php require_once("menu.php"); ?>
			<div id="content">
				<div style="font-family: Arial, Helvetica, sans-serif; margin:50px;">
				<h2>Seja Bem-vindo!</h2>
				 
				<p style="text-align: center; font-size: 14px;">
					Neste painel você poderá cadastrar informações que são exibidas no site!
				</p>
				<br clear="all" />
				<img src="css/img/administrador.png" style="float: center;"/>
				<br clear="all" /><br />
			</div>			      
			</div>

			<footer>
				<div id="desenvolvido">
					&copy; Copyright  by Tiago
				</div>
			</footer>
		</div>
	</body>
</html>
