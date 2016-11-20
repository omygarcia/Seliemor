<?php
session_start();
$correo = addslashes($_POST['txt_correo']);
$pw = addslashes($_POST['txt_pw']);
$conn = new mysqli("127.0.0.1","root","","db_seliemor");
$consulta = "SELECT id_usuario,nombre,nivel FROM tb_usuarios WHERE correo='$correo' AND pw='$pw'";
if($result = $conn->query($consulta))
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_array();
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['usuario'] = $row['nombre'];
		$_SESSION['nivel'] = $row['nivel'];
		header("Location:../gestion.php");
	}
	else
	{
		header("Location:../index.php?error=si");
	}
}
else
{
	echo "Fallo la consulta";
}
$conn->close();
?>