<?php
session_start();
require_once("../clases/class.Carrito.php");
Carrito::EliminarProducto($_POST['id_producto']);
?>