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
	$subtitulo = "";
	$descricao = "";
	$foto = "";
	$data = "";
	$mensagem="";
	
	//Validando Campos enviados pelo formulário *******************************************************************************
	function ValidaCampos($titulo, $subtitulo, $descricao){
		$msg="";
		
		if($titulo == "")
		$msg = $msg. "O título deve ser informado!\\n";
		   
		if($subtitulo == "")
		$msg = $msg. "O subtítulo deve ser informado!\\n";
		
		if($descricao == "")
		$msg = $msg. "A descrição deve ser informada!\\n";
		   
		return $msg;
	}
	
	//Validando imagem enviada pelo formulário**********************************************************************************
	function ValidaImagem($id, $arquivo){
		$msg="";
		if ($arquivo["error"] > 0)
		  {
		   $msg = "Erro: " . $arquivo["error"] . "<br>";
		  }
		else
		  {
		    $allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $arquivo["name"]);
			$extension = end($temp);
			if ((($arquivo["type"] == "image/gif")
			|| ($arquivo["type"] == "image/jpeg")
			|| ($arquivo["type"] == "image/jpg")
			|| ($arquivo["type"] == "image/pjpeg")
			|| ($arquivo["type"] == "image/x-png")
			|| ($arquivo["type"] == "image/png"))
			&& ($arquivo["size"] < 9000000)
			&& in_array($extension, $allowedExts))
			  {
			      move_uploaded_file($arquivo["tmp_name"],
			      "noticias/".$id."noticia.".$extension);
			  }
			else
			  {
			  $msg = "Arquivo inválido";
			  }
		  }
		return $msg;
	}
	
	//Recebendo dados para consulta
	if(isset($_GET['param'])){
		$param = (int)$_GET['param'];
		$SQL = "SELECT * FROM noticias WHERE not_id=".$param;
		$execute_query = mysql_query($SQL, $conn); 
		if($query = @mysql_fetch_array($execute_query)){ 
			$titulo = $query['not_titulo'];
			$subtitulo = $query['not_subtitulo'];
			$descricao = $query['not_descricao'];
			$foto = $query['not_foto'];
			$data = $query['not_data'];
		} 
	}
	
	//verifica se existe ação de um dos botões do formulário ******************************************************************
	if(isset($_POST['Botao'])){
		$botao = $_POST['Botao'];
		$titulo = $_POST['txtTitulo'];
		$subtitulo = $_POST['txtSubtitulo'];
		$descricao = $_POST['txtDescricao'];
		$foto = $_FILES['txtFoto'];
		$data = date('Y/m/d');
		
		if($botao=="Novo"){
			$botao = "";
			$titulo = "";
			$subtitulo = "";
			$descricao = "";
			$foto = "";
			$data = "";
		}else{
			$mensagem = ValidaCampos($titulo, $subtitulo, $descricao);
		}
		
		
		//Inserindo novo Registro ***********************************************************************************************
		if($botao=="Cadastrar" AND $mensagem==""){
			$SQL = "INSERT INTO noticias(not_titulo, not_subtitulo, not_descricao, not_data) VALUES ('$titulo','$subtitulo','$descricao','$data')";
			$execute_query = mysql_query($SQL, $conn);
			if($execute_query){
				$ultimo_id = mysql_insert_id($conn);
				$mensagem = ValidaImagem($ultimo_id, $foto);
				
				if(!$mensagem){
					$temp = explode(".", $foto["name"]);
					$extension = end($temp);
					$img =  $ultimo_id."noticia.".$extension;
					$SQL = "UPDATE noticias SET";
					$SQL = $SQL. " not_foto='".$img."'";
					$SQL = $SQL. " WHERE not_id=".$ultimo_id;
					
					$updade = mysql_query($SQL, $conn);
					if($updade){
						mysql_close($conn);
						$mensagem = "Registro gravado com sucesso!";
					}
					else{
						mysql_close($conn);
						$mensagem = "Registro inserido com erros. Não foi possível inserir a imagem!";
					}
				}
				else{
					mysql_close($conn);
					$mensagem = "Registro inserido com erros. Não foi possível inserir a imagem!";
				}
				
				$botao = "";
				$titulo = "";
				$subtitulo = "";
				$descricao = "";
				$foto = "";
				$data = "";                 
				
		   	} else{
			    $mensagem = "Não foi possível cadastrar!";
		   	}
		}

		//Atualizando Registro ****************************************************************************************************
		else if($botao=="Editar" AND $mensagem==""){
			$codigo = (int)$_POST['txtId'];
			$mensagem = ValidaImagem($codigo, $foto);
			if($foto["error"] == 0){
				$temp = explode(".", $foto["name"]);
				$extension = end($temp);
				$img =  $codigo."noticia.".$extension;
				$SQL = "UPDATE noticias SET not_titulo='$titulo'";					  
				$SQL = $SQL. ", not_subtitulo='$subtitulo'";
				$SQL = $SQL. ", not_descricao='$descricao'";
				$SQL = $SQL. ", not_foto='$img'";
				$SQL = $SQL. " WHERE not_id=".$codigo;
				$execute = mysql_query($SQL, $conn);
				if($execute){
					$botao = "";
					$titulo = "";
					$subtitulo = "";
					$descricao = "";
					$foto = "";
					$data = ""; 
					$mensagem = "Registro alterado com sucesso!";
				}else{
			    	$mensagem = "Não foi possível atualizar!";
			   	}
			}
			else{
				$SQL = "UPDATE noticias SET not_titulo='$titulo'";					  
				$SQL = $SQL. ", not_subtitulo='$subtitulo'";
				$SQL = $SQL. ", not_descricao='$descricao'";
				$SQL = $SQL. " WHERE not_id=".$codigo;
				$execute = mysql_query($SQL, $conn);
				if($execute){
					$botao = "";
					$titulo = "";
					$subtitulo = "";
					$descricao = "";
					$foto = "";
					$data = ""; 
					$mensagem = "Registro alterado com sucesso!";
				}else{
			    	$mensagem = "Não foi possível atualizar!";
			   	}
			}
		}
		
		//Excluindo Registro ****************************************************************************************************
		else if($botao=="Excluir"){
			$codigo = (int)$_POST['txtId'];
			echo $codigo;
			$SQL = "DELETE FROM noticias WHERE not_id=".$codigo;
			$execute = mysql_query($SQL, $conn);						
			if($execute){
				$botao = "";
				$titulo = "";
				$subtitulo = "";
				$descricao = "";
				$foto = "";
				$data = ""; 
				$mensagem = "Registro excluído com sucesso!";
			}else
				$mensagem = "Não foi possível excluir!";
		}
		
		//Botão Sair **************************************************************************************************************
		else if($botao=="Sair"){
	    	mysql_close($conn);
	        header("location:noticias.php");
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
					GERENCIAR NOTÍCIAS<br />
				</div>
				<br clear="all" />
				<form method="post" action="noticias_cad.php" enctype="multipart/form-data">
					<?php if(isset($param)){ ?>
						<input type="hidden" name="txtId" value="<?=$param?>" />
					<?php } ?>
					<table>
						<tr>
							<td class="coluna1"><label>*</label> TÍTULO: </td>
							<td class="coluna2"><input type="text" name="txtTitulo" value="<?=$titulo?>" style="width: 500px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"><label>*</label> SUBTÍTULO: </td>
							<td class="coluna2"><input type="text" name="txtSubtitulo" value="<?=$subtitulo?>" style="width: 500px;"/></td>
						</tr>
						<tr>
							<td class="coluna1" style="vertical-align: top;	"><label>*</label> IMAGEM: </td>
							<td class="coluna2">
								<input type="file" name="txtFoto" value=""/> <br />
								<?php if(isset($param) AND $foto!=""){ ?>
									<img src="noticias/<?=$foto?>" style="margin-top: 5px; height: 100px;"/>
								<?php }?>
							</td>
						</tr>
					</table>
					
					<div id="editor">			
						<textarea class="ckeditor" name="txtDescricao"> <?=$descricao?> </textarea>
						<script>
						$( document ).ready( function() {
							$( 'textarea#txtDesccricao' ).ckeditor();
						} );
						</script>
					</div>
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
