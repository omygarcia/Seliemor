<?php
require_once("../clases/class.DataManager.php");
$id_producto = $_POST['id_producto'];
$comentario = strip_tags($_POST['comentario']);
$conn = DataManager::getConexion();
$consulta = "INSERT INTO tb_comentario (comentario,fecha_publicacion,tipo_comentario,id_producto) values('$comentario','".date('Y/m/d')."','1','$id_producto')";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "<div class='ok'>tu comentario se registrado con exito</div>";
	}
	else
	{
		echo "<div class='error'>no se pudo registrar tu comentario ".$conn->error."</div>";
	}
}
else
{
	echo "<div class='error'>fallo la consulta</div> ".$conn->error;
}
$conn->close();
?>