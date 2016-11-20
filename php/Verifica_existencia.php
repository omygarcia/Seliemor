<?php
session_start();
require_once("../clases/class.DataManager.php");
$id_producto = $_POST['id_producto'];
$cant = $_POST['cant'];
$conn = DataManager::getConexion();
$consulta = "SELECT cant_existente FROM tb_producto where id_producto='$id_producto'";
$info = array();
if($result = $conn->query($consulta))
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_array(MYSQLI_NUM);
		if(!is_numeric($cant))
		{
			$info['bool'] = false;
			$info['msg'] = "Introduce un valor numerico";
			$info['cant'] = $row[0];
		}
		else if($cant == 0)
		{
			$info['bool'] = false;
			$info['msg'] = "Numero no valido";
			$info['cant'] = $row[0];
		}
		else if($cant > $row[0])
		{
			$info['bool'] = false;
			$info['msg'] = "El numero supera la cantidad de existencia";
			$info['cant'] = $row[0];
			$_SESSION['cant'][$id_producto] = $row[0];
		}
		else
		{
			$info['bool'] = true;
			$info['msg'] = "";
			$info['cant'] = 1;
		}
	}
	else
	{
		$info['bool'] = true;
		$info['msg'] = "No se encontraron registros";
		$info['cant'] = 1;
	}
}
else
{
	$info['bool'] = true;
	$info['msg'] = "Fallo la consulta";
	$info['cant'] = 1;
}
$conn->close();
echo json_encode($info);
?>