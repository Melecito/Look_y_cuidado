<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=look_y_cuidado",
			"root",
			"");

		$link->exec("set names utf8");

		return $link;

	}
}