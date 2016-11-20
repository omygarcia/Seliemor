<?php
session_start();
require_once("../clases/class.Carrito.php");
$id_producto = $_POST['id_producto'];
$cant = $_POST['Cant'];
Carrito::Cant($id_producto,$cant);
//echo $_SESSION['Cant'][$id_producto];
?>