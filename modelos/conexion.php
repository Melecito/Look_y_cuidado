<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=db;dbname=look_y_cuidado", 
		"root", 
		"root");

		$link->exec("set names utf8");

		return $link;

	}
}