<?php 
	
		include_once('clsConexionOracle.php');
		include_once('passwordEncrypt.php');
		include_once('xmlFun.php');

		$data = file_get_contents("php://input");
		$valores = json_decode($data,TRUE);

		$conexion = new oracleConexion("mhacienda","12345","192.168.0.8/XE");

		$conex = $conexion->conectar();

		//$sqlQuery = "SELECT PUBLICKEY FROM KEYS WHERE NUMREGISTRO = '".$valores['codEmpresa']."' AND KEYTYPE = 'PU'";		
		//$select = $conexion->execSelect($conex,$sqlQuery);

		//while (oci_fetch($select)) {		    
    	//	$publicKey = oci_result($select, 'PUBLICKEY');    		
		//}

		//echo $publicKey;
		//cho $valores['key'];

		//if (strcmp($publicKey,$valores['key'])!==0) {
		//	deliver_response(400, "OK", array("respuesta"=>"Las llaves no coinciden","codigoError"=>1));
		//}else{
			
			libxml_use_internal_errors(true);
			$xsdPath="xsd/formato.xsd";
			$xml = new DOMDocument(); 
			$xml->loadXML($valores['xml']);
			$val1 = "'";
			$val2 = '"';

			if (!$xml->schemaValidate($xsdPath)) {
    			print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
    			$error = libxml_display_errors();    			
    			deliver_response(400, "OK", array("respuesta"=>"ERROR DE XML","codigoError"=>$error));

			}else{
				$xmlChange = str_replace($val1, $val2, $valores['xml']);				
				$sqlQuery = "INSERT INTO FACTURAS(NUMREGISTRO,FACTURA) 
				VALUES('".$valores['codEmpresa']."',xmltype('".$xmlChange."'))";				
				$execute = $conexion->execCrud($conex,$sqlQuery);
				if (is_bool($execute)){
					deliver_response(200, "OK", array("respuesta"=>"Ok"));	
				}else{
					deliver_response(400, "OK", array("respuesta"=>"ERROR AL INSERTAR EN LA BASE DE DATOS"));
				}
	        	

			}
			
			


?>