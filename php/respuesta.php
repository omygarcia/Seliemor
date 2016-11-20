<?php
require_once("../clases/class.DataManager.php");
$conn = DataManager::getConexion();
echo var_dump($_POST);
$id_comentario = $_POST['id_comentario'];
$comentario = $_POST['comentario'];
$id_producto = $_POST['id_producto'];
$id_comenterio_r = 0;
try
{
	$conn->autocommit(false);
	$consulta = "insert into tb_comentario (comentario,fecha_publicacion,tipo_comentario,id_producto)
	value('$comentario','".date('Y/m/d')."','2','$id_producto')";
	if(!$conn->query($consulta))
	{
		throw new Exception("Fallo la consulta".$conn->error);
	}
	if($conn->affected_rows == 0)
	{
		throw new Exception("No se pudo registrar el comentario");
	}
	$id_comentario_r = $conn->insert_id;
	$consulta = "insert into tb_comentario_respuesta (id_comentario,id_comentario_r)
			value ('$id_comentario','$id_comentario_r')";
	if(!$conn->query($consulta))
	{
		throw new Exception("fallo la consulta 2",$conn->error);
	}
	if($conn->affected_rows == 0)
	{
		throw new Exception("No se pudo registrar el comentario");
	}
	$conn->commit();
	echo "El comentario se registro con exito";
}
catch(Exception $ex)
{
	$conn->rollback();
	echo $ex->getMessage();
}
$conn->autocommit(true);
$conn->close();
?>