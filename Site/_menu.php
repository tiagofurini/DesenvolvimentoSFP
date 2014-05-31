<?php
$SQL_igreja = "SELECT ni_id, ni_titulo FROM nossa_instituicao";
$execute_query_igreja = mysql_query($SQL_igreja, $conn); 

$SQL_padroeiro = "SELECT * FROM padroeiro";
$execute_query_padroeiro = mysql_query($SQL_padroeiro , $conn); 
?>

<ul id="trans-nav">
	<li><a href="index.php">INÍCIO</a></li>
	<li><a href="#">NOSSA IGREJA</a>
		<ul>
			<?php
			while($query_igreja = @mysql_fetch_array($execute_query_igreja)){ ?>
				<li> <a href="nossaigreja.php?ni=<?=$query_igreja['ni_id']?>"> <?=$query_igreja['ni_titulo']?> </a> </li>
			<?php } ?>
		</ul>
	</li>
	<li><a href="#">PADROEIRO</a>
		<ul>
			<?php
			while($query_padroeiro = @mysql_fetch_array($execute_query_padroeiro)){ ?>
				<li> <a href="padroeiro.php?ni=<?=$query_padroeiro['pad_id']?>"> <?=$query_padroeiro['pad_titulo']?></a> </li>
			<?php } ?>
		</ul>
	</li>
	<li><a href="#">NOTÍCIAS</a></li>
	<li><a href="#">GALERIAS</a>
		<ul>
			<li> <a href="fotos.php"> FOTOS </a></li>
			<!--<li> <a href="#"> VÍDEOS </a></li>-->
		</ul>
	</li>
	<li><a href="#">CONTATO</a></li>
</ul>