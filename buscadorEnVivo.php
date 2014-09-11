<?php
	/*include 'libreria/configx.php';
	include 'libreria/conexion.php';
*//*
	$valor = $_POST['valor'];

	$sql = "SELECT nombre_comercial FROM medicamento where nombre_comercial LIKE '%$valor%'";
	$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
	while($fila = mysqli_fetch_assoc($rs)){
		
		echo '<input type="checkbox"/>'.$fila['nombre_comercial']."\n";
	}*/


?>