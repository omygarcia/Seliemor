<?php
session_start();
require_once("clases/class.MasterPage.php");
require_once("clases/class.DataManager.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport"  content="width=device-width,initial-scale=1"/>
	<title>Pedidos</title>
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
			<h3>Pedidos</h3>
			no hay pedidos por el momento
			<br />
			<form id="form_pedidos">
				<select name="slp_proveedor">
					<option value="1">Cisco</option>
				</select>
				<br />
				<table id="tabla_pedidos">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$conn = DataManager::getConexion();
							$consulta = "SELECT * FROM tb_producto";
							if($result = $conn->query($consulta))
							{
								if($result->num_rows > 0)
								{
									$i=0;
									while ($row = $result->fetch_array()) 
									{
										echo "<tr>
							<td><input type='checkbox' name='ck_producto[$i]' checked='true' value='1' /></td>
							<td><input type='hidden' name='hdn_id_producto[$i]' value='".$row['id_producto']."' />".utf8_encode($row['producto'])."</td>
							<td><input type='number' name='txt_cant[$i]' value='1' /> </td>
						</tr>";
										$i++;
									}
								}
								else
								{
									echo "No se encontraron registros";
								}
							}
							else
							{
								echo "fallo la consulta";
							}
						?>
					</tbody>
				</table>
				<br />
				<input type="button" onClick="generarPedido()" class="boton" value="generar Pedido" />
				<div id="div_resp_pedido"></div>
			</form>
		</article>
		<aside>
			<?php
				DataManager::getConexion();
				$consulta = "SELECT * FROM vw_comentarios_admon WHERE tipo_comentario='3'";
				if($result = $conn->query($consulta))
				{
					if($result->num_rows >0)
					{
						while ($row = $result->fetch_array()) 
						{
							echo "<div class='com'><b>Fecha:</b> ".$row['fecha_publicacion']." <br /> ".$row['comentario']."
								<br />
								<input onClick='marcarComoAtendida(".$row['id_comentario'].")' class='boton' type='button' value='marcar como atendida' />
							</div>";
						}
					}
					else
					{
						echo "No se encontraron registros";
					}
				}
				else
				{
					echo "fallo la consulta";
				}
				$conn->close();
			?>
		</aside>
	</section>
	<?php 
		MasterPage::drawFooter();
	?>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/slider.js"></script>
</body>
</html>