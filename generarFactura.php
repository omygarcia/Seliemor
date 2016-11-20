<?php
session_start();
require_once("clases/class.MasterPage.php");
require_once("clases/class.DataManager.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facturas</title>
	<meta name="viewport"  content="width=device-width,initial-scale=1"/>
	<link rel="stylesheet" href="css/estilos.css" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
	<?php
		MasterPage::drawHeader();
		date_default_timezone_set("America/Monterrey");
	?>
	<section id="contenedor">
		<form id="form_Factura">
			<label>Fecha expedicion:</label><br />
			<input type="text" name="fecha_expedicion" readonly  value="<?php echo date('Y/m/d');?>" /><br />
			<label>Hora expedicion:</label>
			<input type="time" name="hora_expedicion" value="<?php echo date('H:i',time());?>" /><br />
			<label>Lugar expedicion</label>
			<select name="slp_lugar_expe">
				<option value='1'>Surcursal Puebla 1</option>
			</select>
			<br />
			<label>Forma de Pago</label><br />
			<select name="slp_forma_pago">
				<?php
					$conn = DataManager::getConexion();
					$consulta = "SELECT * from tb_forma_pago";
					if($result = $conn->query($consulta))
					{
						if($result->num_rows > 0)
						{
							while ($row = $result->fetch_array(MYSQLI_NUM)) 
							{
								echo "<option value='".$row[0]."'>".$row[1]."</option>";
							}
						}
						else
						{
							echo "no se encontraron registros";
						}
					}
					else
					{
						echo "fallo la consulta";
					}
					$conn->close();
				?>
			</select>
			<br />
			<label>clave de venta:</label><br />
			<input type="text" name="id_venta" /><br />
			<input type="button" class="boton" onClick="RegistraFactura()" value="Registrar" />
		</form>
		<div id="div_resp_factura"></div>
	</section>
	<?php
		MasterPage::drawFooter();
	?>
</body>
</html>