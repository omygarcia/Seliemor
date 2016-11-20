<?php
require_once("../clases/class.DataManager.php");
$comentario = $_POST['comentario'];
$conn = DataManager::getConexion();
$consulta = "INSERT INTO tb_comentario (comentario,fecha_publicacion,tipo_comentario,id_producto,mareli)
values('$comentario','".date('Y/m/d')."','3','1','1')";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "la consulta se realizo con exito";
	}
	else
	{
		echo "no se pudo insertar el registro";
	}
}
else
{
	echo "fallo la consulta";
}
$conn->close();
?>