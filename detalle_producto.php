<?php
session_start();
require_once("clases/class.DataManager.php");
require_once("clases/class.MasterPage.php");
require_once("clases/class.Carrito.php");
?>
<html>
<head>
	<title>Detalle Producto</title>
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
	<h3>Detalle Producto</h3>
	<?php
		if(isset($_GET["id_producto"]))
		{
			$conn = DataManager::getConexion();
			$consulta = "SELECT id_producto,producto,precio,descripcion,imagen FROM tb_producto WHERE id_producto='".$_GET["id_producto"]."'";
			if($result = $conn->query($consulta))
			{
				if($result->num_rows > 0)
				{
					$row = $result->fetch_array(); 
				
						echo "<img class='responsive' style='max-width:380px;' src='img/".$row["imagen"]."' /><br />";
						echo "<b>Producto: </b>".$row["producto"]."<br />";
						echo "<b>Precio: </b>".$row["precio"]."<br />";
						echo "<b>Descripcion: </b>".$row["descripcion"]."<br /><br />";
						if(!isset($_SESSION['carrito'][$row['id_producto']]))
						{
							echo "<input type='button' class='boton_carrito' onClick='AgregarProducto(".$row['id_producto']."),getTotalProductos()' value='Agregar al Carrito' /><br /><br />";
						}
						else
						{
							echo "<input type='button' style='background:#f20;color:#fff;' value='Producto Agregado' />";
						}
						$id = $row['id_producto'];
						$consulta = "SELECT id_comentario,comentario,fecha_publicacion  from tb_comentario where id_producto='".$_GET['id_producto']."'and tipo_comentario='1'";
						
						?>
						<br />
						<br />
						<label>Calfifica la calidad del Producto</label><br />
						<input onClick="calf(this.value)" type="radio" name="rdn_calf" value="10" />10%
						<input onClick="calf(this.value)" type="radio" name="rdn_calf" value="25" />25%
						<input onClick="calf(this.value)" type="radio" name="rdn_calf" checked value="50" />50%
						<input onClick="calf(this.value)" type="radio" name="rdn_calf" value="75" />75%
						<input onClick="calf(this.value)" type="radio" name="rdn_calf" value="100" />100%
						<br />
						<meter id="escala" min="0" low="50" high="100" max="100" value="50" style="width=90%;" ></meter>
						<br />
						<input type="button" class="boton" onClick="calificar_producto()" value="calificar" />
						<br />
						<label>Danos tu opini&oacute;n</label><br />
						<input type="hidden" id="slp_producto" value="<?php echo $id;?>" />
						<textarea id="txa_comentario" placeholder="danos tu opini&oacute;n"></textarea>
						<br />
						<input type="button" class="boton" onClick="Comentar()" value="enviar" /> 
						<div id="div_resp_coment"></div>
						<?php
						if($result = $conn->query($consulta))
						{
							if($result->num_rows > 0)
							{
								while ($row = $result->fetch_array()) 
								{
									echo "<div class='com'><b>Fecha: </b>".$row['fecha_publicacion']."<br /> ".utf8_decode($row['comentario'])."<br /><a onClick='Responder(".$row['id_comentario'].")' href='#'>responder</a></div>";
									echo "<input type='hidden' name='hdn_id_producto' value='".$id."' />";
									$consulta = "SELECT x1.id_comentario, x3.comentario, x3.fecha_publicacion, x3.tipo_comentario
FROM tb_comentario_respuesta x1
LEFT JOIN tb_comentario x2 ON x1.id_comentario=x2.id_comentario
LEFT JOIN tb_comentario x3 ON x1.id_comentario_r=x3.id_comentario
WHERE x1.id_comentario =  '".$row['id_comentario']."' AND X3.tipo_comentario =  '2'";								
									$result1 = $conn->query($consulta);
									while ($row1 = $result1->fetch_array()) {
										echo "<br /><div class='com'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha:".$row1['fecha_publicacion']."<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$row1['comentario']."</div>";
									}
								}
							}
							else
							{
								echo "No se encontraron registros";
							}
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
		}
	?>
	</article>
	<aside>
		<h3>Carrito</h3>
			<section id="cart_1">
				<section id="cart_img">
					<img src="img/carrito-1.png" style="max-width:7em;diplay:block;margin:0 auto;" class="responsive" />
				</section>
				<section id="cart_info">
					<p><?php Carrito::getTotalProductos();?> PROD.</p>
					<a href="detalle_carrito.php">ver Carrito</a>
				</section>
			</section>
	</aside>
	</section>
	<?php
		MasterPage::drawFooter();
	?>
	<section id='fondo_modal'>
		<form>
			<span onClick="cerrar()" id="cerrar">x</span>
			<input type='hidden' id="hdn_id_coment" value="0" />
			<textarea id="comentario_res" placeholder="respuesta"></textarea>
			<input type='button' onClick='actionResponder()' class="boton" value="responder" />
		</form>
	</section>
</body>
</html>