<?php

class Conexion{

	public function conectar(){
		$cnn = new PDO("mysql:host=localhost;dbname=kinder","root","12345");
		//var_dump($cnn);
		return $cnn;
	}
	
}
// 
/*$a = new Conexion();
$a->conectar();*/

?>