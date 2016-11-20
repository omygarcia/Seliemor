<?php
session_start();
if(!isset($_SESSION['usuario']))
{
	header("Location:index.php");
}
if($_SESSION['nivel'] < 3)
{
	header("Location:index.php");
}
require_once("clases/class.MasterPage.php");
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
		<article style="width:90%;margin:0 0 0 1em;">
			<fieldset>
				<legend id="ld">Alta de Productos</legend>
				<input  type="button" onClick="Registrar()" value="registrar" />
				<input  type="button" onClick="Modificar()" value="modificar" />
				<form id="form1" action="php/GuardadProducto.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="hdn_id_producto" />
					<label>Producto:</label><br />
					<input type="text" name="producto" placeholder="Nombre producto" /><br />
					<label>Precio:</label><br />
					<input type="text" name="precio" placeholder="precio" /><br />
					<label>descripcion:</label><br />
					<textarea id="txa_descripcion" name="descripcion" placeholder="descripcion"></textarea><br />
					<label>Imagen:</label><br />
					<input type="file" name="archivo_fls" /><br />
					<label>Proveedor:</label><br />
					<select name="sltProveedor">
						<option value="1" selected="true">independiente</option>
					</select>
					<br />
					<label>Categoria:</label><br />
					<select name='slp_categoria'>
						<option value='1'>tecnologia</option>
					</select>
					<br /><br />
					<input id="res" type="submit" value="registrar" />
					<input id="mod" type="button" class='boton' onClick="Actualizar()" value="Actualizar" />
				</form>
			</fieldset>
		</article>
		<?php
		if(isset($_GET["mensaje"]))
		{
			echo "<b>".$_GET["mensaje"]."</b>";
		}
		?>
		<div class="scroll-tabla">
		<table>
			<thead>
				<th>Id</th><th>Producto</th><th>Precio</th><th>Descricion</th><th>Proveedor</th><th>Atualizar</th><th>Eliminar</th>
			</thead>
			<tbody>
			<?php
				$conn = DataManager::getConexion();
				$consulta = "SELECT id_producto, producto, precio, descripcion, imagen, id_categoria, id_proveedor
from tb_producto";
				if($result = $conn->query($consulta))
				{
					if($result->num_rows > 0)
					{
						while ($row = $result->fetch_array()) 
						{
							echo "<tr>
									<td>".$row['id_producto']."</td><td>".$row['producto']."</td><td>".$row['precio']."</td><td>".utf8_encode($row['descripcion'])."</td><td>".$row['id_proveedor']."</td><td><a href='#' onClick='cargaDatos(".$row[0].")'>Atualizar</a></td><td><a href='#' onClick='Eliminar(".$row[0].")'>Eliminar</a></td>
								  </tr>";
						}
						echo "</tbody>";
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
		</table>
		</div>
	</section>
	<?php
		MasterPage::drawFooter();
	?>
</body>
</html>