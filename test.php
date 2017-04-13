<?php 
	
	$conn = oci_connect('mhacienda', '12345', '192.168.0.19/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

 ?>