<?php
session_start();
require_once("../clases/class.DataManager.php");
$id_cliente = $_SESSION['id_usuario'];
$id_producto = $_POST['hddn_id_producto'];
$precio = $_POST['txtPrecio'];
$cantidad = $_POST['txtCantidad'];
$id_venta = 0;
try
{
	$conn = DataManager::getConexion();
	$conn->autocommit(false);
	$consulta = "INSERT INTO tb_venta (fecha,id_cliente)
	values('".date('Y/m/d')."','$id_cliente')";
	if($conn->query($consulta))
	{
		if($conn->affected_rows > 0)
		{
			$id_venta = $conn->insert_id;
		}
		else
		{
			throw new Exception("No se pudo registrar la venta ".$conn->error);
		}
	}
	else
	{
		throw new Exception("Fallo la consulta ".$conn->error);
	}
	for($i=0;$i<count($id_producto);$i++)
	{
		$consulta = "INSERT INTO tb_detalle_venta (id_producto,cant,precio,id_venta) values('".$id_producto[$i]."','".$cantidad[$i]."','".$precio[$i]."','".$id_venta."')";
		if(!$conn->query($consulta))
		{
			throw new Exception("Fallo la consulta 2 ".$conn->error);
		}	
		if($conn->affected_rows == 0)
		{
			throw new Exception("No se pudo insertar el registro");
		}
	}
	$conn->commit();
	echo "el pedido se registro con exito";
	echo "<a class='boton' href='php/factura.php?id_venta=$id_venta' target='_blank'>generar Pedido</a>";
}
catch(Exception $ex)
{
	$conn->rollback();
	echo $ex->getMessage();
}
$conn->autocommit(true);
$conn->close();
?>