<?php
session_start();
require_once("../clases/class.Carrito.php");
Carrito::AgregarProduct($_POST['id_producto']);
?>