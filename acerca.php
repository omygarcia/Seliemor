<?php
session_start();
require_once("clases/class.MasterPage.php");
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Acerca</title>
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
		<article id="article-acerca">
			<h3>Misión</h3>
			<hr />
			<p>
				Asegurar los resultados y la competencia de nuestros clientes, cumpliendo  y excediendo  los requisitos y expectativas tanto en el
				ámbito empresarial como en el de gobierno federal y estatal, en todo lo referente a Infraestructura de Tecnologías de la Información 
				(TI), proporcionando asistencia técnica confiable.
			</p>
			<br />
			<h3>Visión</h3>
			<hr />
			<p>
				Ser reconocida, en el mercado global, como una empresa que ofrece soluciones sólidas, ágiles y de alta calidad en Productos y Servicios
				de Tecnologías de Información (TI), logrando la satisfacción de sus clientes internos y externos.
			</p>
			<br />
		</article>
		<aside>
			<video id="video-acerca" controls preload>
    			<source src="videos/Informacion de la Empresa.mp4" type="video/mp4" />
        		<source src="videos/Informacion de la Empresa.webm" type="video/webm" />
        		<source src="videos/Informacion de la Empresa.ovg" type="video/ogg" />
    		</video>
		</aside>
	</section>
	<?php
		MasterPage::DrawFooter();
	?>
</body>
</html>