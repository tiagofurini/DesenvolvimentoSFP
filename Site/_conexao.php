<?php
//$conn = mysql_connect("187.45.210.108","bd_olaup","Upj*20127") or die ("Nao foi possivel conectar");
//$db = mysql_select_db("bd_aulas",$conn) or die ("N�o foi poss�vel conectar ao banco de dados");
$conn = mysql_connect("localhost","root","") or die ("Nao foi possivel conectar");
$db = mysql_select_db("bd_site",$conn) or die ("Nao foi possivel localizar o banco de dados");
mysql_query("SET NAMES UTF8");
 
?>