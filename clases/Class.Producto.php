<?php

class Producto
{
	private $producto;
	private $precio;
	private $descripcion;
	private $imagen;
	private $id_proveedor;
	private $id_categoria;

	public function __construct($produc,$prec,$desc,$img,$id_proveedor,$id_categor)
	{
		$this->producto = $produc;
		$this->precio = $prec;
		$this->descripcion = $desc;
		$this->imagen = $img;
		$this->id_proveedor = $id_proveedor;
		$this->id_categoria = $id_categor;
	}

	public function getNombre()
	{
		return $this->producto;
	}

	public function getPrecio()
	{
		return $this->precio;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function getRuta()
	{
		return $this->imagen;
	}

	public function getIdProveedor()
	{
		return $this->id_proveedor;
	}

	public function getId_Categoria()
	{
		return $this->id_categoria;
	}

}


interface ICarrito 
{
	function AgregarProducto(Producto $producto);
	function QuitarProducto($id);
	function CambiarCantida($id,$cantidad);
	function Comprar();
}
?>