<?php
	
	$numeroRegistro = $_GET['registro'];
	$registro =  base64_decode($numeroRegistro);
    $filename = "formato.xsd";
    $homedir = "/opt/lampp/htdocs/facturaDigital/xsd/formato.xsd";        
    if (!$homedir) {
    	die('File Not Found');
    }else{
    	header("Cache-Control: public");
    	header("Content-Description: File Transfer");
    	header("Content-Disposition: attachment; filename=".$filename);            
    	header("Content-Transfer-Encoding: binary");

    	readfile($homedir);        
    }	
?>
