<?php

class DataManager
{
	public static function getConexion()
	{
		return new mysqli("127.0.0.1","root","","db_seliemor");
		//return new mysqli("mysql5.000webhost.com","a8490583_pepe","Qwerty789","a8490583_seliemo");
	}
}
?>