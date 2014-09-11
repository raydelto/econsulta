<?php 
include 'libreria/engine.php';

$objPlantilla = new plantilla();
class plantilla{

	function __construct(){
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>e-Consulta</title>


	<link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/kube.css">
	<script type="text/javascript" src="js/validaciones.js"></script> 
	<script type="text/javascript" src="js/funciones.js"></script> 
	<script type="text/javascript" src="js/prefixfree.js"></script> 
	<script type="text/javascript"  src="js/prefixfree.vars.js"></script> 
	<script type="text/javascript"  src="js/jquery.min.js"></script> 
	<script type="text/javascript"  src="js/kube.js"></script> 


</head>
<body>
	<header>
		<h1>eConsulta</h1>
		<nav class="">
		    <ul>
		        <li id="inicio"><a href="./">Inicio</a></li>
			    <li id=""><a href="mantenimientoPacientes.php">Mant. Pacientes</a></li>
			    <li id=""><a href="diagnostico.php">Mant. Diagnostico</a></li>
			    <li id=""><a href="prueba_laboratorio.php">Prueba de Lab.</a></li>
			    <li id=""><a href="tratamiento.php">Tratamiento</a></li>
			    <li id=""><a href="Citas.php">Citas</a></li>
			    <li id=""><a href="medicamentos.php">Medicamentos</a></li>
			    <li id=""><a href="gestionDeVisitas.php">Gestión de Visitas</a></li>
			    <li id=""><a href="sintoma.php">Mant. Sintomas</a></li>
			    <li id=""><a href="tipoPrueba.php">Tipo Prueba</a></li>
			    <li id=""><a href="historialPacientes.php">Historial de Pacientes</a></li>
			    <li id=""><a href="reportes.php">Reportes</a></li>
			  
			  
		    </ul>
		</nav>
	</header>
	<section id="cuerpo">
	<?php

	}
	function __destruct(){
	?>
	
	</section>
	<footer>
		<h3>-Powered By El Super Ray-</h3>
	</footer>
</body>
</html>
<?php
	}
}
