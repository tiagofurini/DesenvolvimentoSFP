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
	
	$busca="";
	$SQL = "SELECT * FROM nossa_instituicao";
	$execute_query = mysql_query($SQL, $conn); 
	if(@mysql_num_rows($execute_query) > 0){
		$busca="ok";
	} 
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
				<div id="pagina"> 
					GERENCIAR NOSSA IGREJA<br />
					<a href="aigreja_cad.php"> <img src="css/img/cadastrar.png" style="margin-top: 10px;"/></a>
				</div>
				<br clear="all" />
				<table id="consulta">
					<thead>
					<tr>
						<th>TÍTULO</th>
						<th style="width: 80px; text-align: center;">OPÇÃO</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$cont=1;
					if($busca=="ok"){
						while($query = @mysql_fetch_array($execute_query)){
							if($cont%2==0){ 
								echo "<tr class='odd'>";
							}else{ 
								echo "<tr>";
    					 	}?>
								<td style="text-align: left;"><?=$query['ni_titulo']?></td>
								<td><a href="aigreja_cad.php?param=<?=$query['ni_id']?>"><img src="css/img/editar.png" /></a> </td>
							</tr>
					<?php $cont++; }
					}else{?>
						<tr>
							<td colspan="3">Não existe dados cadastrados!</td>
						</tr>
					<?php }?>
					<tbody>
				</table>
			</div>			      
			<footer>
				<div id="desenvolvido">
					&copy; Copyright  by Tiago
				</div>
			</footer>
		</div>
	</body>
</html>
