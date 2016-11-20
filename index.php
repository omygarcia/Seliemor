<?php
session_start();
require_once("clases/class.MasterPage.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport"  content="width=device-width,initial-scale=1"/>
	<title>Inicio</title>
	<link rel="stylesheet" href="css/slider.css" />
	<link rel="stylesheet" href="css/estilos.css" />
	<script src="js/funciones.js"></script>
</head>
<body>
	<?php 
		MasterPage::drawHeader();
	?>
	<section id="contenedor">
		<article>
		<div class="form_container">
			<div class="sliderContainer">
				<div class="slide" data-background='img/slider-11.png'>
					<!-- Texto -->
				</div>
				<div class="slide" data-background='img/slider-12.png'>
					<!-- Texto -->
				</div>
				<div class="slide" data-background='img/slider-13.png'>
					<!-- Texto -->
				</div>
		</div>
		<button class="left">&#60;</button>
		<button class="right">&#62;</button>
		</article>
		<aside>
			<video id="video-acerca" controls preload>
    			<source src="videos/Tervirdesk.mp4" type="video/mp4" />
        		<source src="videos/Tervirdesk.webm" type="video/webm" />
        		<source src="videos/Tervirdesk.ovg" type="video/ogg" />
    		</video>
    		<br />
			<hgroup><s><h3>Ingresar</h3></s></hgroup>
			<form action="php/login.php" method="post">
				<label>Correo:</label><br />
				<input type="mail" name="txt_correo" placeholder="Introduce tu correo" /><br />
				<label>Password:</label><br />
				<input type="password" name="txt_pw" placeholder="Introduce tu Password" /><br />
				<input type="submit" value="Ingresar" />
				<a href="form_registro_user.php">Registrarse</a>
			</form>
		</aside>
		<section id="div_clientes">
		<center>
			<hr />
			<hgroup><h3>Nuestros Clientes</h3></hgroup>
			<br />
			<ul class="inline">
				<li><img src="img/banamex.png" /></li>
				<li><img src="img/holiday.png" /></li>
				<li><img src="img/soriana.png" /></li>
			</ul>
		</center>
		</section>
	</section>
	<?php 
		MasterPage::drawFooter();
	?>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/slider.js"></script>
</body>
</html>