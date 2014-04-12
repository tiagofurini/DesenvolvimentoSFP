<?php
	ob_start();
    session_start();
	
	//<!-------------- Import Classes e Funcoes ------------------------------------------------ >
	require_once("conexao.php");
	
	//<!-------------- Recebendo dados do Formulário ------------------------------------------- >
	if(isset($_POST["txtLogin"])){
	$login = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];
	}
	
	//<!-------------- Valida Campos ----------------------------------------------------------- >
    
    $mensagem = "";
    function ValidaCampos($login, $senha)
       {
       		$msg="";
           if($login == "")
		    $msg = "O campo Login deve ser informado !\\n";
		   
		   if($senha == "")
		    $msg = $msg. "O campo Senha deve ser informado !";
			
		   return $msg;
       }
	   

		if(isset($_POST["botEntrar"]))
        {
           $mensagem = ValidaCampos($login, $senha);
           if(!$mensagem)
			{
				$SQL = "SELECT user_id, user_nome";
				$SQL = $SQL. " FROM usuarios";
				$SQL = $SQL. " WHERE user_login = '$login' AND user_senha = '$senha'";			
				$execute_query = mysql_query($SQL, $conn);
				if(@mysql_num_rows($execute_query) > 0)
				{
					$query = mysql_fetch_array($execute_query);
					$_SESSION["user_id"] = $query["user_id"];
					$_SESSION["user_nome"] = $query["user_nome"];	
					mysql_close($conn);
					header("location:painel.php");														
				}
				else{
					$mensagem =$SQL."Usuário não encontrado!";
				}
			}
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Painel - Congelados Agnaldo</title>
		<style>
			body{
				background-image:url('css/img/fundo.png');
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
			}
			table{
				background-color: #ccc;
			}
			input[type=password], input[type=text]{
				border: 1px solid #666;
				width: 250px;
			}
			
		</style>
	</head>
	
	<body>
		<br/><br/><br/>
	    <form action="index.php" method="post">
	        <table align="center" cellpadding="3" cellspacing="0" style="border: 5px solid #666;">
	            <tr>
	                <td><table border="0" align="center" cellpadding="5" cellspacing="0">
	                        <tr>
	                            <td style="text-align: center;">
	                            	<img src="css/img/login.png">
	                            	<br clear="all"/>
	                            	<br/>
	                            	<hr />
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>Login<br><input type="text" name="txtLogin"/></td>
	                        </tr>
	                        <tr>
	                            <td>Senha<br><input type="password" name="txtSenha"/></td>
	                        </tr>
	                        <tr>
	                            <td>
	                            	<input type="submit" name="botEntrar" value="Entrar">
	                            	<img src="css/img/cadeado.png" style="float: right;" />	                            	
	                            </td>
	                        </tr>
	                    </table></td>
	            </tr>
	        </table>
	        <br>
	        <br>
	    </form>
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