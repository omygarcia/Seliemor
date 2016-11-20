<?php
require_once("../clases/class.DataManager.php");
$ck_producto = $_POST['ck_producto'];
$cant = $_POST['txt_cant'];
$id_producto = $_POST['hdn_id_producto'];
if(isset($ck_producto))
{
	try
	{
		$i=0;
		$id_pedido=0;
		$conn = DataManager::getConexion();
		$conn->autocommit(false);
		$consulta = "INSERT INTO tb_pedido (id_proveedor,fecha)
		values('1','".date('Y/m/d')."')";
				if(!$conn->query($consulta) || $conn->affected_rows == 0)
				{
					throw new Exception("Fallo la consulta".$conn->error);
				}
				$id_pedido = $conn->insert_id;
		foreach ($ck_producto as $key=>$value) 
		{
			if(isset($key))
			{
				
					$consulta = "INSERT INTO tb_detalle_pedido (id_producto,cantidad,id_pedido)
					values('".$id_producto[$i]."','".$cant[$i]."','".$id_pedido."')";
					if(!$conn->query($consulta) || $conn->affected_rows == 0)
					{
						throw new Exception("fallo la consulta 2".$conn->error);
					}
			}
			else
			{
				echo "false";
			}
			$i++;
		}
		$conn->commit();
		echo "El pedido se registro con exito";
		echo "<script>window.open('php/OrdenPedido.php?id_pedido=$id_pedido','_blank')</script>";
	}
	catch(Exception $ex)
	{
		$conn->rollback();
		echo $ex->getMessage();
	}
	$conn->autocommit(true);
	$conn->close();
}
else
{
	echo "no seleccionaste ninguna opcion";
}

?>