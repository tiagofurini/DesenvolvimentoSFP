<?php

	ob_start();
    session_start();
    include("include/funcoes.php");
	if(!valida_sessao($_SESSION["user_id"]))
       {
          header("location:index.php");
          exit();
       }
	
	//<!-------------- Import Classes e Funcoes ------------------------------------------------ >
	require_once("conexao.php");
	require_once("include/banco.php");
	
	$botao = "";
	$titulo = "";
	$url = "";
	$data = "";
	$mensagem="";
	
	//Validando Campos enviados pelo formulário *******************************************************************************
	function ValidaCampos($titulo, $url){
		$msg="";
		
		if($titulo == "")
		$msg = $msg. "O título deve ser informado!\\n";
		
		if($url == "")
		$msg = $msg. "O código deve ser informada!\\n";
		   
		return $msg;
	}
	
	//Validando imagem enviada pelo formulário**********************************************************************************

	
	//Recebendo dados para consulta
	if(isset($_GET['param'])){
		$param = (int)$_GET['param'];
		$SQL = "SELECT * FROM videos WHERE vid_id=".$param;
		$execute_query = mysql_query($SQL, $conn); 
		if($query = @mysql_fetch_array($execute_query)){ 
			$titulo = $query['vid_titulo'];
			$url = $query['vid_url'];
			$data = $query['vid_data'];
		} 
	}
	
	//verifica se existe ação de um dos botões do formulário ******************************************************************
	if(isset($_POST['Botao'])){
		$botao = $_POST['Botao'];
		$titulo = $_POST['txtTitulo'];
		$url = $_POST['txtUrl'];
		$data = date('Y/m/d');
		
		if($botao=="Novo"){
			$botao = "";
			$titulo = "";
			$url = "";
			$data = "";
		}else{
			$mensagem = ValidaCampos($titulo, $url);
		}
		
		
		//Inserindo novo Registro ***********************************************************************************************
		if($botao=="Cadastrar" AND $mensagem==""){
			$SQL = "INSERT INTO videos(vid_titulo, vid_url, vid_data) VALUES ('$titulo','$url','$data')";
			$execute_query = mysql_query($SQL, $conn);
			if($execute_query){
				$mensagem = "Registro gravado com sucesso!";
			}
			else{
				mysql_close($conn);
				$mensagem = "Não foi possível cadastrar!";
			}
			$botao = "";
			$titulo = "";
			$url = "";
			$data = "";                 
		}

		//Atualizando Registro ****************************************************************************************************
		else if($botao=="Editar" AND $mensagem==""){
			$codigo = (int)$_POST['txtId'];
			$SQL = "UPDATE videos SET vid_titulo='$titulo'";					  
			$SQL = $SQL. ", vid_url='$url'";
			$SQL = $SQL. " WHERE vid_id=".$codigo;
			$execute = mysql_query($SQL, $conn);
			if($execute){
				$botao = "";
				$titulo = "";
				$url = "";
				$data = ""; 
				$mensagem = "Registro alterado com sucesso!";
			}else{
		    	$mensagem = "Não foi possível atualizar!";
		   	}
		}
		
		//Excluindo Registro ****************************************************************************************************
		else if($botao=="Excluir"){
			$codigo = (int)$_POST['txtId'];
			echo $codigo;
			$SQL = "DELETE FROM videos WHERE vid_id=".$codigo;
			$execute = mysql_query($SQL, $conn);						
			if($execute){
				$botao = "";
				$titulo = "";
				$url = "";
				$data = ""; 
				$mensagem = "Registro excluído com sucesso!";
			}else
				$mensagem = "Não foi possível excluir!";
		}
		
		//Botão Sair **************************************************************************************************************
		else if($botao=="Sair"){
	    	mysql_close($conn);
	        header("location:videos.php");
			exit();
		}
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
		<script src="www.ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
		<script src="ckeditor/adapters/jquery.js"></script>

		
	</head>

	<body>
		<div id="container">
			<?php require_once("menu.php"); ?>

			<div id="content">
				<div id="pagina"> 
					GERENCIAR VÍDEOS<br />
				</div>
				<br clear="all" />
				<form method="post" action="videos_cad.php" enctype="multipart/form-data">
					<?php if(isset($param)){ ?>
						<input type="hidden" name="txtId" value="<?=$param?>" />
					<?php } ?>
					<table>
						<tr>
							<td class="coluna1"><label>*</label> TÍTULO: </td>
							<td class="coluna2"><input type="text" name="txtTitulo" value="<?=$titulo?>" style="width: 500px;"/></td>
						</tr>
						<tr>
							<td class="coluna1" style="vertical-align: top;"><label>*</label> Código: </td>
							<td class="coluna2">
								<input type="text" name="txtUrl" value="<?=$url?>" style="width: 500px;"/> 
								<br />
								<span style="font-size: 11px; font-weight: normal;"> Exemplo: <span style="color: red;">5pgI_iMXzeM</span> (https://www.youtube.com/watch?v=<span style="color: red;">5pgI_iMXzeM</span>)</span>
								<?php if(isset($param)){ ?>
								<br clear="all"/><br/>
								<iframe width="500" height="280" src="//www.youtube.com/embed/<?=$url?>" frameborder="0" allowfullscreen></iframe>
								<?php }?>
							</td>
						</tr>
					</table>
					<br/>
					<div>
						<?php if(isset($param)){ ?>
						<input type="submit" name="Botao" value="Editar" class="button"/>
						<input type="submit" name="Botao" value="Excluir" class="button"/>
						<input type="submit" name="Botao" value="Novo" class="button"/>
						<?php } else{?>
						<input type="submit" name="Botao" value="Cadastrar" class="button"/>
						<?php } ?>
						<input type="submit" name="Botao" value="Sair" class="button"/>
					</div>
				</form>
			</div>

			<footer>
				<div id="desenvolvido">
					&copy; Copyright  by Tiago
				</div>
			</footer>
		</div>
	</body>
</html>

<?php 
	if($mensagem!="") { ?>
	<script language="javascript">
		alert("<?=$mensagem?>");
    </script>
	<?php
	}	
?>
