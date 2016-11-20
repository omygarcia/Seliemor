<?php
require_once("../clases/Class.Producto.php");
require_once("../clases/Class.Papeleria.php");
$product = addslashes($_POST['producto']);
$precio = addslashes($_POST['precio']);
$descrip = addslashes($_POST['descripcion']);
$archivo = $_FILES['archivo_fls']['tmp_name'];
$destino = "../img/".$_FILES["archivo_fls"]["name"];
$imagen = $_FILES["archivo_fls"]["name"];
$id_proveedor = $_POST['sltProveedor'];
$id_category = $_POST['slp_categoria'];
if(isset($_FILES["archivo_fls"]))
{
	move_uploaded_file($archivo,$destino);
}
else
{
	$imagen="default.jpg";
}
$producto = new Producto($product,$precio,$descrip,$imagen,$id_proveedor,$id_category);
$papeleria = new Papeleria();
$msg = $papeleria->addProduct($producto);
header("Location:../gestion.php?mensaje=".$msg);
?>