
<?php 
  include_once('../servicios/clsConexionOracle.php');
  //insertar codigo para validar inicio de sesion activa 
  //***************************************************
  //***************************************************
  //***************************************************
?>
<!DOCTYPE html>
<html ng-app="app">
<head>
	<title>Registro de Empresas</title>
	<!-- AngularJS Resource -->
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular.min.js"></script>
	<!-- Script APIREST Resource -->
	<script src="../scripts/script.js"></script>
	<!-- Jquery Resource -->
	<script src="../recursos/jquery-3.1.1.min.js"></script>
	<!-- Bootstrap Resource -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- css style Resource -->
	<link rel="stylesheet" type="text/css" href="../estilos/style.css">
	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<!-- Google Fonts -->
	<script src="https://use.fontawesome.com/710c906195.js"></script>

	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- bootstrap ui - AngularJS  -->
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>

    <!-- Prueba-->
    <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-animate.js"></script>

</head>
<body ng-controller="employessController">
	<div class="container">
		<div class="row main">
			<div class="panel-heading">			
	            <div class="panel-title text-center">
	               	<h1 class="title"><img src="mh_logo.png"  style="width: 300px"></h1>
	               	<h1 class="title">Módulo de Facturas</h1>	               	
	               	<h2 class="title">Facturas Digitales</h2>
	              	<hr/>	             
	            </div>	            
	        </div>
	        <div class="panel-headinge">
	        	
	        </div>	        
	        <main class="row">
            <div class="col-lg-12">
        	<div class="col-lg-1"></div>
               	<div class="col-lg-10">
               		<div class="panel panel-primary">
           		    <div class="panel-heading">
           					
                                                     <table class='table table-bordered'>                                             
                                <?php 

                                

                                $conn = new  oracleConexion("mhacienda","12345","192.168.43.203/XE");//nuevo objeto de conexion

                                $cones = $conn->conectar();//inicia conexion
                                                $sqlQuery= "select * from FACTURAS where NUMREGISTRO = '".$_GET['registo']."'";	//editar la consulta para que tire los datos 
                                                                                      //***************************************************
                                                                                      //***************************************************
                                                                                      //***************************************************de x usuario	
                                                 $datos = $conn->execSelect($cones,$sqlQuery); 
                                                  
                                                  echo "<tr>";
                                                  echo "<td>Numero Registro</td>";
                                                  echo "<td>Empresa</td>";
                                                  echo "<td>Factura</td>";
                                                  echo "</tr>";
                                                while ($dat=oci_fetch_array($datos, OCI_ASSOC)) {             
                                                 echo "<tr>";
                                                  foreach ($dat as $item) {
                    
                                                                             echo "<td>".$item."</td>";
                                                                           } echo "</tr>";
                                                }

                          
                                ?>
                                                         </table>
                            </div>
            		    <div class="panel-body">
                                          
		            </div>
        		</div>                	                
               	</div>
        	<div class="col-lg-1"></div>  
            </div>
	</main>	        	
	        
		</div>
	</div>

</body>
</html>
