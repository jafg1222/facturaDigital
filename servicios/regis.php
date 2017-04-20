<?php		
		include_once('clsConexionOracle.php');
		include_once('passwordEncrypt.php');

		$data = file_get_contents("php://input");
		$valores = json_decode($data,TRUE);

		$conexion = new oracleConexion("mhacienda","12345","192.168.0.19/XE");

		$conex = $conexion->conectar();

		$sqlQuery = "INSERT INTO 
			PERSONA(NUMCEDULA,PERNOMBRE,PERPRIMAPE,PERSEGAPE,PERDIRECCION,PEREMAIL,PERNUMTELEFONO) 
			VALUES('".$valores['cedula']."','".$valores['nombre']."','".$valores['primApe']."','".$valores['segApe']."','".$valores['direcciones']."','".$valores['correo']."','".$valores['telefono']."')";			

		$execute = $conexion->execCrud($conex,$sqlQuery);

			if (is_bool($execute)) {
				$sqlQuery = "";
				$numeroRegistro = rand(1,10000);
				$date = new DateTime();

				$sqlQuery = "INSERT INTO REGISTRO VALUES 
				('".$numeroRegistro."','".$valores['cedula']."',TO_DATE('".date_format($date,'Y-m-d H:i:s')."', 'yyyy/mm/dd hh24:mi:ss'))";

				$execute2 = $conexion->execCrud($conex,$sqlQuery);

					if (is_bool($execute2)) {
						$sqlQuery = "";
						$sqlQuery = "INSERT INTO FECHASACTIVIDADES VALUES ('".$numeroRegistro."','".$valores['fechaInicio']."','".$valores['fechaFin']."')";
						     $execute3 = $conexion->execCrud($conex,$sqlQuery);

						     if(is_bool($execute3)){
						     	$sqlQuery = "";

						     	$hash = new encryptPass();
								$hash->Password = $valores['pass'];
								$passEncrypt = $hash->Get_Hash_Pass();

								$sqlQuery = "INSERT INTO LOGIN VALUES('".$numeroRegistro."','".$passEncrypt."')";

								$execute4 = $conexion->execCrud($conex,$sqlQuery);

								if (is_bool($execute4)) {
										deliver_response(200, "OK", array("Registro Exitoso"));			
									}else{
										deliver_response(400, "OK", array($sqlQuery));
									}
						     }
					}
							
			}else{

			}		
						








?>
