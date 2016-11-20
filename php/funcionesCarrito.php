<?php
session_start();
require_once("../clases/class.Carrito.php");

switch ($_POST['funcion']) 
{
	case 'getTotalProductos':
			Carrito::getTotalProductos();
		break;
	
	default:
			echo "No valido";
		break;
}
?>