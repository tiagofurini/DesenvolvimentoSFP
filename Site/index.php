<?php
include("include/funcoes.php");
include("_conexao.php");
$SQL_banner = "SELECT * FROM banners where ban_status=1";
$execute_query_banners = mysql_query($SQL_banner, $conn); 


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
		<link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'> 
		
		<script type='text/javascript' src='css/js/jquery.min.js'></script>
	    <script type='text/javascript' src='css/js/jquery.mobile.customized.min.js'></script>
	    <script type='text/javascript' src='css/js/jquery.easing.1.3.js'></script> 
	    <script type='text/javascript' src='css/js/camera.min.js'></script> 

	    <script>
			jQuery(function(){
				
				jQuery('#camera_wrap_1').camera({
					thumbnails: true
				});
	
				jQuery('#camera_wrap_2').camera({
					height: '400px',
					loader: 'bar',
					pagination: false,
					thumbnails: true
				});
			});
		</script>
	</head>

	<body>
		<header>
			<div style="width: 1040px;  height:auto; display: table; margin: 0 auto; padding: 0px;">
				<img src="css/img/logo.png" style="float: left; margin-top: 4px;"/>
				<div style="float: right;">
					<div style="width:100%; height:80px; float: right;"></div>
					<nav>
						<?php include '_menu.php'; ?>
					</nav>
				</div>
			</div>
		</header>
		<br clear="all" />
		<div id="container">
			<div class="box01"> </div>
			<div class="box02" style="min-height:500px; "> 
				<div id="slide">
					<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
						
						<?php
						while($query_banners = @mysql_fetch_array($execute_query_banners)){ ?>							
							<div data-thumb="admin/banners/<?=$query_banners["ban_foto"]?>" data-src="admin/banners/<?=$query_banners["ban_foto"]?>">
				                <div class="camera_caption fadeFromBottom">
				                    <?=$query_banners["ban_descricao"]?>
				                </div>
				            </div>
						<?php } ?>
			        </div>
		       </div>
		       
		       <div id="noticias">
		       		<div class="titulo" style="width: 120px;"> NOTÍCIAS </div>
		       		<div id="notp">
		       			<a href="#">
			       			<img src="css/img/edcarlos.jpg"/>
			       			<h3>7 Anos de Sacerdócio - Edcarlos Amorim</h3>
			       			<p>
			       				Ao Padre Edcarlos Amorim Moreira, que completa 7 anos de Sacerdócio, nosso sinceros desejos de felicidade.
			       			</p>
		       			</a>
		       		</div>
		       		<div class="info">
			       		<a href="#">
			       			<img src="css/img/semana.jpg" />
				       		<p>
				       			<b>Semana Satana</b> <br />
				       			<span> Todos temos necessidade de melhorar, de mudar para melhor..</span>
				       		</p>   
					 	</a>   		
		       		</div>
		       		<div class="info">
			       		<a href="#">
			       			<img src="css/img/ramos.jpg" />
				       		<p>
				       			<b>Semana Satana</b> <br />
				       			<span> Todos temos necessidade de melhorar, de mudar para melhor..</span>
				       		</p>
					 	</a>   		
		       		</div>
		       		<div class="info">
			       		<a href="#">
			       			<img src="css/img/reuniao.jpg" />
				       		<p>
				       			<b>Semana Satana</b> <br />
				       			<span> Todos temos necessidade de melhorar, de mudar para melhor..</span>
				       		</p>
				       		<br clear="all" />
				       		<p>
					       		<a href="#"> <span> + Mensagens </span></a>
					       	</p>    
					 	</a>   		
		       		</div>
		       </div>
		       
		       <div id="recados">
		       		<div class="titulo" style="width: 120px;"> RECADOS </div>
		       		
		       		<img src="css/img/recado.jpg" />
		       </div>
			</div>
			<div class="box03"> </div>
			
			<div class="box01" style="margin-top: 5px;"> </div>
			<div class="box02" style="min-height:200px; "> 
				<div id="papa">
		       		<div class="titulo" style="width: 200px;"> PAPA FRANCISCO </div><br />
			       	<a class="twitter-timeline" href="https://twitter.com/Pontifex_pt" data-widget-id="459123188044009472">Tweets de @Pontifex_pt</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		       	</div>
							       
		    <div id="facebook">
		    	<div class="titulo" style="width: 150px;"> FACEBOOK </div><br />
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FIgreja-S%25C3%25A3o-Francisco-de-Paula-Narandiba%2F441085622673734%3Ffref%3Dts&amp;width=450&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:258px;" allowTransparency="true"></iframe>
			</div>

			</div>
			<div class="box03"> </div>
		</div>
		<footer>
			<div id="boxfooter">
				<di id="contato">
					<h2> Entre em Contato</h2><br/>
					<p>
						Rua da Igreja São Francisco de Paula, nº 222<br />
						Bairro: Principal<br />
						Narandiba - SP
					</p>
					<br />
					<p><img src="css/img/email.png"/> contato@igrejasaofranciscodepaula.com</p>
					<p><img src="css/img/tel.png"/> (18)1111-1111 / (18)2222-2222</p>
				</di>
				<div id="mapa">
					<iframe width="450" height="230" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=210061710079638317275.0004f7bea1d76a07ca6d5&amp;ie=UTF8&amp;t=h&amp;ll=-22.408291,-51.525096&amp;spn=0.002976,0.004839&amp;z=17&amp;output=embed"></iframe><br /><small>Ver <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=210061710079638317275.0004f7bea1d76a07ca6d5&amp;ie=UTF8&amp;t=h&amp;ll=-22.408291,-51.525096&amp;spn=0.002976,0.004839&amp;z=17&amp;source=embed" style="text-align:left">Igreja São Francisco de Paula, Narandiba - SP</a> num mapa maior</small>
				</div>
				<div id="developer">
						&copy; Copyright  by Pascom Narandiba
				</div>
			</div>
		</footer>
	</body>
</html>
