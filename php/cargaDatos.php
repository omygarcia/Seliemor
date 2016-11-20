<?php
require_once("../clases/class.DataManager.php");
$id_producto = $_POST['id_producto'];
$conn = DataManager::getConexion();
$consulta = "SELECT * from tb_producto WHERE id_producto='$id_producto'";
$info = array();
if($result = $conn->query($consulta))
{
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_array())
		{
			$info['id_producto'] = $row['id_producto'];
			$info['producto'] = $row['producto'];
			$info['precio'] = $row['precio'];
			$info['descripcion'] = $row['descripcion'];
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
echo json_encode($info);
?>