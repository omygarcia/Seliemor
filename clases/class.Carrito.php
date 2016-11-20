<?php
require_once("class.DataManager.php");

class Carrito
{
	public static function AgregarProduct($id_producto)
	{
		$_SESSION['carrito'][$id_producto] = $id_producto;
		Carrito::MostrarCarrito();
	}

	public static function MostrarCarrito()
	{
		if(!isset($_SESSION['carrito']) || $_SESSION['carrito'] == null)
		{
			return;
		}
		$consulta = "SELECT id_producto, producto, precio, descripcion FROM tb_producto WHERE id_producto=-1";
		foreach ($_SESSION['carrito'] as $key) 
		{
			$consulta.=" or id_producto=".$key;
		}
		$conn = DataManager::getConexion();
		if($result = $conn->query($consulta))
		{
			if($result->num_rows > 0)
			{
				$total = 0;
				$i=1;
				$cad="";
				echo "<form id='form_cart'><table id='tb_carrito'>
							<thead>
								<th>Id</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Precio</th>
								<th>Cant.</th>
								<th>Importe</th>
								<th></th>
							</thead>
							<tbody>";
				$j=0;
				while ($row = $result->fetch_array()) 
				{
					
					$cant = (isset($_SESSION['Cant'][$row['id_producto']]))?$_SESSION['Cant'][$row['id_producto']]:1;
					echo "<tr>
							<td><input type='hidden' name='hddn_id_producto[$j]' value='".$row['id_producto']."' />".$row['id_producto']."</td>
						  	<td>".utf8_encode($row['producto'])."</td>
						  	<td>".utf8_encode($row['descripcion'])."</td>
						  	<td>".$row['precio']."<input type='hidden' name='txtPrecio[$j]' value='".$row['precio']."' /></td>
						  	<td><input type='number' name='txtCantidad[$j]' onChange='Total(),addCantidad(".$row['id_producto'].",this.value),Verifica_existencia(".$row['id_producto'].",this)' min='1' value='".$cant."' /></td>
						  	<td><input type='text' name='txtImporte[$j]' value='".$row['precio']*$cant."' readonly /></td>
						  	<td><a onClick='EliminarProductoCarrito(".$row['id_producto']."),getTotalProductos()' href='#'>Eliminar</a></td>
						  </tr>";
						  $total=$total+($row['precio']*$cant);
						  $cad.="<input type='hidden' name='item_name_".$i."' value='".$row['producto']."' />
							<input type='hidden' name='quantity_".$i."' value='".$cant."' />
							<input type='hidden' name='amount_".$i."' value='".$row['precio']."' />";
							$i++;
							$j++;
				}			
				echo "</tbody>
						</table></form>";
						echo "<div id='formas_pago'><br />";
				echo "Total: <input type='text' id='txt_Total' name='txt_total' value='".$total."' readonly />";
				echo "<br /><hr /><br /><b>Escoge tu forma de pago</b><br><input name='rdn_tipo_pago' checked type='radio' onClick='MostrarFormaPago(1)' />Paypal <input name='rdn_tipo_pago' type='radio' onClick='MostrarFormaPago(2)' />Ventanilla";
				
				?>
					
						<div id="pago_paypal">
						<b>Nota: </b>El usuario necesitara tener una cuenta en paypal para 
						poder realizar los pagos.
				<?php
				echo "<div id='boton_paypal'>
						<form id='form_pay' action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
							<input type='hidden' name='cmd' value='_cart' />
							<input type='hidden' name='upload' value='1' />
							<input type='hidden' name='business' value='ogarcia_700-facilitator@hotmail.com' />";
							echo $cad;
							echo "<img src='img/boton_paypal.png' />
							<input type='submit' onClick='registrarPedido()' value='comprar' />
						</form>
					  </div>";
					  ?>
					  </div>
					  <div id="pago_ventanilla">
						<b>Nota: </b> al imprimir la orden de pago solo tendra 2 dias habiles para 
						realizar el pago.
					  	<br /><input onClick="registrarPedido()" type='button' class='boton' value='Imprimir Orden de Pago' />
					  	<div id="resp_reg_pedido"></div>
					  </div>
					  Si requiere factura , favor de contactar al administrador
					  	al correo admin@hotmail.com
					  	o si require mas cantidad de algun producto
					  	<br />
					  	comunicate con el administrador
					  	<textarea id="txa_comentario">
					  	</textarea>
					  	<input onClick='comentaAdmon()' type="button" value="enviar" />
					  	<div id="div_resp_com"></div>
					  <?php
			}
			else
			{
				throw new Exception("No se encontaron registros");
			}
		}
		else
		{
			throw new Exception("Fallo la consulta ".$conn->error);
		}
		$conn->close();
	}

	public static function EliminarProducto($id_producto)
	{
		unset($_SESSION['carrito'][$id_producto]);
		Carrito::MostrarCarrito();
	}

	public static function getTotalProductos()
	{
		$count = 0;
		if(isset($_SESSION['carrito']))
		{
			foreach ($_SESSION['carrito'] as $key) 
			{
				$count=$count+1;
			}
			echo $count;
		}
		else
		{
			echo $count;
		}
	}


	public static function Cant($id_producto,$Cant)
	{
		$_SESSION['Cant'][$id_producto] = $Cant;
	}
}
?>