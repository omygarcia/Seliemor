<?php
require_once("../clases/Class.Papeleria.php");
$id_producto = $_POST['id_producto'];
$calif = $_POST['rdn_calif'];
switch ($calif) {
	case '10':
		$calif=1;
		break;
	case '25':
		$calif=2;
		break;
	case '50':
		$calif=3;
		break;
	case '75':
		$calif=4;
		break;
	case '100':
		$calif=5;
		break;
	
	default:
		echo "No elegiste ninguna opcion";
		break;
}
$sel = new Papeleria();
$sel->Calificar_Producto($id_producto,$calif)
?>