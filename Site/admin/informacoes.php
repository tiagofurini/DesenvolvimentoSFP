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
	$codigo="";
	$nome="";
	$rua="";
	$numero="";
	$bairro="";
	$cidade="";
	$cep="";
	$site="";
	$email="";
	$facebook="";
	$youtube="";
	$twitter="";
	$fone1="";
	$fone2="";
	$mensagem="";
	
	//Validando Campos enviados pelo formulário *******************************************************************************
	function ValidaCampos($nome, $rua, $numero, $bairro, $cidade){
		$msg="";
		
		if($nome == "")
		$msg = $msg. "O nome deve ser informado!\\n";
		
		if($rua == "")
		$msg = $msg. "A rua deve ser informada!\\n";
		
		if($numero == "")
		$msg = $msg. "O númeor deve ser informada!\\n";
		
		if($bairro == "")
		$msg = $msg. "O bairro deve ser informada!\\n";
		
		if($cidade == "")
		$msg = $msg. "A cidade deve ser informada!\\n";
		   
		return $msg;
	}
	
	//Validando imagem enviada pelo formulário**********************************************************************************

	
	//Recebendo dados para consulta
	$SQL = "SELECT * FROM instituicao";
	$execute_query = mysql_query($SQL, $conn); 
	if($query = @mysql_fetch_array($execute_query)){
		$codigo=$query['inst_id']; 		
		$nome=$query['inst_nome'];
		$rua=$query['inst_rua'];
		$numero=$query['inst_numero'];
		$bairro=$query['inst_bairro'];
		$cidade=$query['inst_cidade'];
		$cep=$query['inst_cep'];
		$site=$query['inst_site'];
		$email=$query['inst_email'];
		$facebook=$query['inst_facebook'];
		$youtube=$query['inst_youtube'];
		$twitter=$query['inst_twitter'];
		$fone1=$query['inst_fone1'];
		$fone2=$query['inst_fone2'];
	} 

	//verifica se existe ação de um dos botões do formulário ******************************************************************
	if(isset($_POST['Botao'])){
		$botao = $_POST['Botao'];
		$nome=$_POST['txtNome'];
		$rua=$_POST['txtRua'];
		$numero=$_POST['txtNumero'];
		$bairro=$_POST['txtBairro'];
		$cidade=$_POST['txtCidade'];
		$cep=$_POST['txtCep'];
		$site=$_POST['txtSite'];
		$email=$_POST['txtEmail'];
		$facebook=$_POST['txtFacebook'];
		$youtube=$_POST['txtYoutube'];
		$twitter=$_POST['txtTwitter'];
		$fone1=$_POST['txtFone1'];
		$fone2=$_POST['txtFone2'];
		
		//Botão Sair **************************************************************************************************************
		if($botao=="Sair"){
	    	mysql_close($conn);
	        header("location:painel.php");
			exit();
		}else{
			$mensagem = ValidaCampos($nome, $rua, $numero, $bairro, $cidade);
		
			if($botao=="Editar" AND $mensagem==""){
				$codigo = (int)$_POST['txtId'];
				$SQL = "UPDATE instituicao SET inst_nome='$nome'";					  
				$SQL = $SQL. ", inst_rua='$rua'";
				$SQL = $SQL. ", inst_numero='$numero'";
				$SQL = $SQL. ", inst_bairro='$bairro'";
				$SQL = $SQL. ", inst_cidade='$cidade'";
				$SQL = $SQL. ", inst_cep='$cep'";
				$SQL = $SQL. ", inst_site='$site'";
				$SQL = $SQL. ", inst_email='$email'";
				$SQL = $SQL. ", inst_facebook='$facebook'";
				$SQL = $SQL. ", inst_youtube='$youtube'";
				$SQL = $SQL. ", inst_twitter='$twitter'";
				$SQL = $SQL. ", inst_fone1='$fone1'";
				$SQL = $SQL. ", inst_fone2='$fone2'";
				$SQL = $SQL. " WHERE inst_id=".$codigo;
				$execute = mysql_query($SQL, $conn);
				if($execute){
					$mensagem = "Registro alterado com sucesso!";
				}else{
			    	$mensagem = "Não foi possível atualizar!";
			   	}
			}
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
				<div id="pagina" style="margin-left:165px;"> 
					GERENCIAR INFORMAÇÕES DA IGREJA<br />
				</div>
				<br clear="all" />
				<form method="post" action="informacoes.php" enctype="multipart/form-data">
						<input type="hidden" name="txtId" value="<?=$codigo?>" />
					<table>
						<tr>
							<td class="coluna1"><label>*</label> NOME: </td>
							<td class="coluna2"><input type="text" name="txtNome" value="<?=$nome?>" style="width: 500px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"><label>*</label> RUA: </td>
							<td class="coluna2"><input type="text" name="txtRua" value="<?=$rua?>" style="width: 500px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"><label>*</label> NÚMERO: </td>
							<td class="coluna2"><input type="text" name="txtNumero" value="<?=$numero?>" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"><label>*</label> BAIRRO: </td>
							<td class="coluna2"><input type="text" name="txtBairro" value="<?=$bairro?>" style="width: 250px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"><label>*</label> CIDADE: </td>
							<td class="coluna2"><input type="text" name="txtCidade" value="<?=$cidade?>" style="width: 250px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> CEP: </td>
							<td class="coluna2"><input type="text" name="txtCep" value="<?=$cep?>" style="width: 100px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> SITE: </td>
							<td class="coluna2"><input type="text" name="txtSite" value="<?=$site?>" style="width: 700px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> EMAIL: </td>
							<td class="coluna2"><input type="text" name="txtEmail" value="<?=$email?>" style="width: 700px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> FACEBOOK: </td>
							<td class="coluna2"><input type="text" name="txtFacebook" value="<?=$facebook?>" style="width: 700px;"/></td>
						</tr>
						<tr>
							<td class="coluna1">YOUTUBE: </td>
							<td class="coluna2"><input type="text" name="txtYoutube" value="<?=$youtube?>" style="width: 700px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> TWITTER: </td>
							<td class="coluna2"><input type="text" name="txtTwitter" value="<?=$twitter?>" style="width: 700px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> FONE 1: </td>
							<td class="coluna2"><input type="text" name="txtFone1" value="<?=$fone1?>" style="width: 120px;"/></td>
						</tr>
						<tr>
							<td class="coluna1"> FONE 2: </td>
							<td class="coluna2"><input type="text" name="txtFone2" value="<?=$fone2?>" style="width: 120px;"/></td>
						</tr>
					</table>
					<br clear="all" />
					<div style="margin-left:165px;padding-left: 0px; display:table; text-align: left;">
						<input type="submit" name="Botao" value="Editar" class="button"/>
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
