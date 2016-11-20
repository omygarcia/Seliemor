<?php
require_once("../clases/class.DataManager.php");
$conn = DataManager::getConexion();
$nombre = $_POST['txt_nombre'];
$apellidos = $_POST['txt_apellidos'];
$rfc = $_POST['rfc'];
$cp = $_POST['cp'];
$tel = $_POST['tel'];
$correo = $_POST['txt_correo'];
$pw = $_POST['txt_pw'];
$consulta = "INSERT INTO tb_usuarios (
 Nombre,
 Apellidos,
 rfc,
 cp,
 tel
  ,correo
  ,pw
  ,nivel) values ('$nombre','$apellidos','$rfc','$cp','$tel','$correo','$pw','1')";
if($conn->query($consulta))
{
	if($conn->affected_rows > 0)
	{
		echo "<div class='ok'>El usuario se registro con exito</div>";
	}
	else
	{
		echo "<div class='error'>No se pudo registrar el usuario</div>";
	}
}
else
{
	echo "<div class='error'>fallo la consulta</div>";
}
$conn->close();
?>