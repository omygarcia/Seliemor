<?php
require_once("../clases/class.DataManager.php");
$id_producto = $_POST['id_producto'];
$conn = DataManager::getConexion();
$consulta = "DELETE FROM tb_producto WHERE id_producto='$id_producto'";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "el producto se elimino con exito";
	}
	else
	{
		echo "No se pudo eliminar el producto ".$conn->error;
	}
}
else
{
	echo "fallo la consulta";
}
$conn->close();
?>