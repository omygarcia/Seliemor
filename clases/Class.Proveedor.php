<?php
class Proveedor
{
	private $_id_Proveedor;
	private $_Nombre;
	private $_Dir;
	private $_Tel;

	public function __construct($nom,$dir,$tel)
	{
		$this->_Nombre = $nom;
		$this->_Dir = $dir;
		$this->_Tel = $tel;
	}

	public function getNombre()
	{
		return $this->_Nombre;
	}

	public function getDir()
	{
		return $this->_Dir;
	}

	public function getTel()
	{
		return $this->_Tel;
	}
}
?>