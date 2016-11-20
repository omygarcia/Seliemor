<?php
require_once("../clases/class.DataManager.php");
$fecha_expedicion = $_POST['fecha_expedicion'];
$hora_expe = $_POST['hora_expedicion'];
$lugar_expe = $_POST['slp_lugar_expe'];
$id_forma_pago = $_POST['slp_forma_pago'];
$id_venta = $_POST['id_venta'];
$conn = DataManager::getConexion();
echo $consulta = "INSERT INTO tb_factura (fecha_expedicion,hora_expedicion,id_lugar_expedicion,id_forma_pago,id_venta)
values('$fecha_expedicion','$hora_expe','$lugar_expe','$id_forma_pago','$id_venta')";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "<div class='ok'>La factura se registro con exito</div>";
		echo "<br /><a class='boton' href='php/factura1.php?id_venta=".$id_venta."' target='true'>Imprimir Factura'</a>";
	}
	else
	{
		echo "<div class='error'>No se pudo registrar la factura</div>";
	}
}
else
{
	echo "fallo la consulta";
}
$conn->close();
?>