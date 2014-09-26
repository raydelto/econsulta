<?php

include 'plantilla.php';

$consulta_id = $_GET['id'];


$tratamiento = "";

$tratamiento_detalles_funciones = new tratamiento_detalles_funciones();

if(isset($_GET['tratamiento'])){
	$tratamiento = $_GET['tratamiento'];

	foreach ($tratamiento as $key => $trata) {
		$id_tratamiento = $tratamiento[$key];

		$tratamiento_detalles_funciones->id = 0; 
		$tratamiento_detalles_funciones->id_tratamiento = $id_tratamiento;
		$tratamiento_detalles_funciones->id_consulta = $consulta_id;
		$tratamiento_detalles_funciones->guardar();

	}

}



if($tratamiento != null){
	
	header("Location:consulta_terminada.php?id={$consulta_id}");
	
}
?>

</script>
<fieldset>
	<legend align="center">Tratamiento</legend>
	<form action="tratamiento_detalles.php" method="get" autocomplete="off">
		<table class="unit-centered">
		
			<tr>
				<td >
					<input type="hidden" value="<?php echo $consulta_id?>" name="id">
				</td>
			</tr>


			<tr>
				<td class="text-centered"><input class=" btn "type="submit" value="Enviar"></td>
			</tr>

		</table>


</fieldset>





<table class="table-bordered unit-centered table-hovered">

				<?php 
					 $tratamiento = tratamiento::listadoTratamientosAgregados();
					if(mysqli_num_rows($tratamiento) < 1){
						echo "<center><h4>Aún no se han agregado tratamiento<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Selección</th>
										<th>Tratamiento</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($tratamiento)) {
						echo <<<CODIGO

						<tr>
							<td class="width-10">{$fila['id']}</td>
							<td class="width-10"><input type="checkbox" value="{$fila['id']}" name="tratamiento[]" id="{$fila['id']}" /></td>
							<td ><label for="{$fila['id']}">{$fila['tratamiento']}</label></td>
						

						</tr>

CODIGO;
						}
					}

				?>

		</table>

