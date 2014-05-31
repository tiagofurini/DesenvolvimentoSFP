<?php
	session_start();
	session_unset();
    session_destroy();
	echo "<script>top.location.href='index.php';alert('Logout Realizado com sucesso!');</script>";
	//	echo"<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>
