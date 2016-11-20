<?php
require_once("../clases/class.DataManager.php");
$id_producto = $_POST['id_producto'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$conn = DataManager::getConexion();
$consulta = "UPDATE tb_producto set producto='$producto',precio='$precio',descripcion='$descripcion' where id_producto='$id_producto'";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "El producto se registrado con exito";
	}
	else
	{
		echo "no se pudo acualizar el producto ".$conn->error;
	}
}
else
{
	echo "fallo la consulta";
}
$conn->close();
?>