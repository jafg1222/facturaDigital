<?php
		include_once('clsConexionOracle.php');

		$data = file_get_contents("php://input");
		$valores = json_decode($data,TRUE);

		$conexion = new oracleConexion("mhacienda","12345","192.168.0.19/XE");

		$conex = $conexionn->conectar();

		$sqlQuery = ""






?>
