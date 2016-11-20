<?php
session_start();
require_once("clases/class.MasterPage.php");
require_once("clases/class.Carrito.php");
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Detalle Carrito</title>
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
		<div id="div_carrito" class="scroll-tabla">
			<?php
				try
				{
					Carrito::MostrarCarrito();
				}
				catch(Exception $ex)
				{
					echo $ex->getMessage();
				}
			?>
		</div>
		<br />
		<a href="Productos.php">Agregar mas productos al carrito</a>
	</section>
	<?php
		MasterPage::drawFooter();
	?>
</body>
</html>