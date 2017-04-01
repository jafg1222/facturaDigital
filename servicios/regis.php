<?php
include_once('clsConexion.php');

$data = file_get_contents("php://input");
$valores = json_decode($data,TRUE);

$stid = oci_parse($conex, "insert into");
oci_execute($stid, OCI_NO_AUTO_COMMIT);  // data not committed

$stid = oci_parse($conn, 'INSERT INTO mytab (col1) VALUES (456)');
oci_execute($stid);  // commits both 123 and 456 values





?>
