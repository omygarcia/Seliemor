<?php
require_once("Class.Proveedor.php");
require_once("Class.Producto.php");
require_once("class.DataManager.php");

interface IPapeleria
{
	function addProduct(Producto $producto);
	function MostrarProductos();
	function EliminarProducto($id);
	function ModificarProducto($id,$prod,$precio,$descrip,$ruta);

	function AgregarProveedor(Proveedor $proveedor);
	function MostrarProveedor();
	function EliminarProveedor($id);
	function ModificarProveedor($id,$prov,$dir,$tel);
}

class Papeleria implements IPapeleria
{
	public function addProduct(Producto $producto)
	{
		$prod = $producto->getNombre();
		$precio = $producto->getPrecio();
		$descrip = $producto->getDescripcion();
		$ruta = $producto->getRuta();
		$id_proveedor = $producto->getIdProveedor();
		$id_category = $producto->getId_Categoria();
		$conn = mysqli_connect("127.0.0.1","root","");
		mysqli_select_db($conn,"db_seliemor");
		$consulta = "INSERT INTO tb_producto (producto,precio,descripcion,imagen,id_calif_product,id_proveedor,id_categoria) values('".$prod."',".$precio.",'".$descrip."','".$ruta."','".$id_proveedor."','".$id_category."')";
		$ejecutar_consulta = mysqli_query($conn,$consulta);
		$id_product = mysql_insert_id($conn);
		$consulta = "INSERT INTO tb_calif_product (id_producto,cant_calif1,cant_calif2,cant_calif3,cant_calif4,cant_calif5) values($id_product,0,0,0,0,0)";
		mysqli_query($conn,$consulta);
		$mensaje = "";
		if(mysqli_affected_rows($conn)>0)
		{
			$mensaje = "Los datos se registraron correctamente";
		}else
		{
			$mensaje = "Hubo un error al registrar los datos ".mysqli_error($conn);;
		}
		mysqli_close($conn);
		return $mensaje;
	}

	public function AgregarProducto($prod,$precio,$descrip,$ruta)
	{
		$conn = mysqli_connect("127.0.0.1","root","");
		mysqli_select_db($conn,"miscelanea");
		$consulta = "INSERT INTO tb_producto (producto,precio,descripcio,imagen) values('".$prod."',".$precio.",'".$descrip."','".$ruta."')";
		$ejecutar_consulta = mysqli_query($conn,$consulta);
		mysqli_close($conn);
	}

	public function MostrarProductos()
	{
		$conn = mysqli_connect("127.0.0.1","root","");
		mysqli_select_db($conn,"db_seliemor");
		$consulta = "SELECT * FROM tb_producto";
		if(isset($_GET['buscar']))
		{
			$consulta.=" WHERE Producto LIKE '%".addslashes($_GET['buscar'])."%'";
		}
		$consulta.=" LIMIT";
		if(isset($_GET['vermas']))
		{
			$consulta.=" ".$_GET['vermas'].",";
		}
		$consulta.=" 11";
		$ejecutar_consulta = mysqli_query($conn,$consulta);
		$numfilas = 1;
		$calif = 0;
		while (($registro =  mysqli_fetch_array($ejecutar_consulta)) && ($numfilas < 9)) {
			$p =new Papeleria();
			$calif = $p->getCalificacion($registro['id_producto']);
			echo '<article class="producto">
				Calif: <meter value="'.$calif.'" min="0" max="100" low="25" high="100">'.$calif.'</meter> '.number_format($calif,0).'%
				';
				echo ($registro['oferta']==1)?"<img src='img/oferta-logo.png' style='max-width:1.9em;' />":"";
				echo '<a href="detalle_producto.php?id_producto='.$registro['id_producto'].'">
					<img src="img/'.$registro['imagen'].'" /></a>
				 <span class="descripcion">
				 	<b>'.$registro['producto'].$registro['id_producto'].'</b>
				 	<p>'.utf8_encode($registro['descripcion']).'</p>
				 	<span class="precio">$'.$registro['precio'].'</span>
				 	<input type="button" class="boton_carrito" onClick="AgregarProducto('.$registro['id_producto'].'),getTotalProductos()" value="Agregar al Carrito" />
				 </span>
			</article>';
			$numfilas++;
		}
		//echo $consulta;
		echo "<br /><div>";

		//link primer producto
		echo "<a class='botones' title='first' href='Productos.php?vermas=0'>|&#60;<a/>&nbsp;";

		//link anterior producto
		if(isset($_GET['vermas']) && $_GET['vermas']>0)
		{
			$back = $_GET['vermas']-8;
			echo "<a class='botones' title='back' href='Productos.php?vermas=".$back."'>&#60;<a/>";
		}
		
		//link siguiente producto
		if(isset($registro['id_producto']))
		{
			$vermas = $registro['id_producto']-1;
			echo "&nbsp;<a class='botones' title='next' href='Productos.php?vermas=".$vermas."'>&#62;<a/>";
		}

		//link ultimo producto
		echo "&nbsp<a class='botones' title='last' href='Productos.php?vermas=26'>&#62;|<a/>";

		echo "</div>";
		
		mysqli_close($conn);
	}

	public function EliminarProducto($id)
	{
		$conn = mysqli_connect("127.0.0.1","root","");
		mysqli_select_db($conn,"miscelanea");
		$consulta = "DELETE FROM tb_producto WHERE id=".$id;
		$ejecutar_consulta = mysqli_query($conn,$consulta);
		mysqli_close($conn);
	}

	public function ModificarProducto($id,$prod,$precio,$descrip,$ruta)
	{	
		$conn = mysqli_connect("127.0.0.1","root","");
		mysqli_select_db($conn,"miscelanea");
		$consulta = "UPDATE tb_producto SET producto='".$prod."' WHERE id=".$id;
		$ejecutar_consulta = mysqli_query($conn,$consulta);
		mysqli_close($conn);
	}

	public function AgregarProveedor(Proveedor $proveedor)
	{
		$nom = $proveedor->getNombre();
		$dir = $proveedor->getDir();
		$tel = $proveedor->getTel();
		$conn = mysqli_connect("127.0.0.1","root","");
		mysqli_select_db($conn,"miscelanea");
		$consulta = "INSERT INTO tb_proveedor (proveedor,dir,tel) values('".$nom."','".$dir."','".$tel."')";
		$ejecutar_consulta = mysqli_query($ejecutar_consulta);
		$mensaje = "";
		if(mysqli_affected_rows($conn) > 0)
		{
			$mensaje = "el proveedor se ha registrado :)";
		}
		else
		{
			$mensaje = "error";
		}
		mysqli_close($conn);
		return $mensaje;
	}

	public function MostrarProveedor()
	{

		//codigo
	}

	public function EliminarProveedor($id)
	{
		//codigo
		$bool = false;
		if(is_numeric($id) && isset($id))
		{
			$conn = new  mysqli("127.0.0.1","root","","miscelanea");
			$conn->set_autocommit(false);
			$consulta = "UPDATE tb_proveedor SET mareli=0 WHERE _proveedor=".$id;
			if($conn->query($consulta))
			{
				$conn->commit();
				$bool = true;
			}
			else
			{
				$conn->rollback();
				$bool = false;
			}
			$conn->set_autocommit(true);
			$conn->close();
		}
		else
		{
			throw new Exception("el parametro de entrada no tiene el formato correcto");
		}
		return $bool;
	}

	public function ModificarProveedor($id,$prov,$dir,$tel)
	{
		//codigo
	}


	public function Calificar_Producto($id_producto,$calif)
	{
		$conn = DataManager::getConexion();
		$consulta = "UPDATE tb_calif_product SET cant_calif$calif=cant_calif$calif+1 WHERE id_producto=$id_producto";
		if($conn->query($consulta))
		{
			if($conn->affected_rows > 0)
			{
				echo "La modificacion se realizo con exito";
			}
			else
			{
				echo "No se pudo modificar";
			}
		}
		else
		{
			echo "Fallo la consulta";
		}
		$conn->close();	
	}


	public function getCalificacion($id_producto)
	{
		$conn = DataManager::getConexion();
		$consulta = "select x1.id_producto, x1.producto,(x2.cant_calif1+ x2.cant_calif2+ x2.cant_calif3+ x2.cant_calif4+ x2.cant_calif5) as 'Total_Votos',(((x2.cant_calif1*10)+ (x2.cant_calif2*25)+ (x2.cant_calif3*50)+ (x2.cant_calif4*75)+ (x2.cant_calif5*100))/(x2.cant_calif1+ x2.cant_calif2+ x2.cant_calif3+ x2.cant_calif4+ x2.cant_calif5)) as 'Calificacion'
FROM tb_producto x1
left join tb_calif_product x2 on x1.id_producto = x2.id_producto where x1.id_producto='$id_producto'";
		$cad = "";
		if($result = $conn->query($consulta))
		{
			if($result->num_rows > 0)
			{
				$calif = 0;
				while ($row = $result->fetch_array()) 
				{
					$calif=$row['Calificacion'];
				}
				$cad = $calif;
			}
			else
			{
				$cad = "No se encontraron registros";
			}
		}
		else
		{
			$cad = "fallo la consulta";
		}
		$conn->close();
		return $cad;
	}
}

?>