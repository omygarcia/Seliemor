<?php
session_start();
require_once("clases/class.MasterPage.php");
require_once("clases/class.DataManager.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Contacto</title>
	<meta name="viewport"  content="width=device-width,initial-scale=1"/>
	<link rel="stylesheet" href="css/estilos.css" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
	<?php 
		MasterPage::drawHeader();
	?>
	<section id="contenedor">
		<article>
			<h3>Contacto</h3>
			<br />
			<p>
				<b>Direccion:</b> 
				15 Norte Col.Centro
			</p>
			<p>
				<b>Tel:</b>
				8-96-08-95
			</p>
			<p>
				<b>Cel:</b>
				044-22-25-98-78
			</p>
			<hr>
			<h3>Redes Sociales</h3>
			<br>
			<a href="#"><img src="img/facebook-logo.png" /></a>&nbsp;
			<a href="#"><img src="img/youtube-logo.png" /></a>
		</article>
		<aside>
			<img src="img/mapa.png" class="responsive">
		</aside>
	</section>
	<?php 
		MasterPage::drawFooter();
	?>
</body>
</html>