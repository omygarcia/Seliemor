<?php
session_start();
require_once("clases/class.MasterPage.php");
require_once("clases/Class.Papeleria.php");
require_once("clases/class.Carrito.php");
require_once("clases/class.DataManager.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Productos</title>
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
	<form action="Productos.php" method="get"> 
		<input type="text" list="dt_productos" name="buscar" />
		<input type="submit" class="prod" value="Buscar" />
		<input type="hidden" name="vermas" value="0" />
		<datalist id="dt_productos">
			<?php
				$conn = DataManager::getConexion();
				$consulta = "SELECT producto FROM tb_producto";
				if($result = $conn->query($consulta))
				{
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_array()) 
						{
							echo "<option value='".utf8_encode($row['producto'])."' />";
						}
					}
					else
					{
						echo "No se encontraron registros";
					}
				}
				else
				{
					echo "Fallo la consulta";
				}
				$conn->close();
			?>
		</datalist>
	</form>
	</article>
		<article>
			<center>
				<?php
					$papeleria = new Papeleria();
					$papeleria->MostrarProductos();
				?>	
			</center>
		</article>
		<aside>
			<h3>Carrito</h3>
			<section id="cart_1">
				<section id="cart_img">
					<img src="img/carrito-1.png" style="max-width:7em;diplay:block;margin:0 auto;" class="responsive" />
				</section>
				<section id="cart_info">
					<p id="lbl_product"><?php Carrito::getTotalProductos();?> PROD.</p>
					<a href="detalle_carrito.php">ver Carrito</a>
				</section>
			</section>
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
		</aside>
	</section>
	<?php
		MasterPage::drawFooter(); 
	?>
</body>
</html>