<?php
require_once("clases/class.DataManager.php");
try
{
	$conn = DataManager::getConexion();
	$conn->Autocommit(false);
	$consulta = "";
	$conn->commit();
}catch(Exception $ex)
{
	$conn->rollback();
	echo $ex->getMessage();
}
$conn->Autocommit(true);
$conn->close();
?>