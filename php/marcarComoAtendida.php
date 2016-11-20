<?php
require_once("../clases/class.DataManager.php");
$id_comentario = $_POST['id_comentario'];
$conn = DataManager::getConexion();
$consulta = "UPDATE tb_comentario SET mareli='0' WHERE id_comentario='$id_comentario'";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "se actualizo con exito";
	}
	else
	{
		echo "no se pudo modificar el registro";
	}
}
else
{
	echo "fallo la consulta";
}
$conn->close();
?>