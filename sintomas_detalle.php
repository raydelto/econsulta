<?php

include 'plantilla.php';

$consulta_id = $_GET['id'];


$sintoma = "";

$sintoma_detalle = new sintoma_detalle();

if(isset($_GET['sintomas'])){
	$sintoma = $_GET['sintomas'];

	foreach ($sintoma as $key => $diag) {
		$id_sintoma = $sintoma[$key];

		$sintoma_detalle->id = 0; //por que será autoingrement
		$sintoma_detalle->id_sintoma = $id_sintoma; //id de cada diagnostico
		$sintoma_detalle->id_consulta = $consulta_id;
		$sintoma_detalle->guardar();

	}

}



if($sintoma != null){
	
	header("Location:diagnostico_detalles.php?id={$consulta_id}");
	
}




?>

</script>
<fieldset>
	<legend align="center">Selecciona los sintomas</legend>
	<form action="sintomas_detalle.php" method="get" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" >
			</tr>
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
					 $sintoma = sintoma::listadoSintoma();
					if(mysqli_num_rows($sintoma) < 1){
						echo "<center><h4>Aún no se han agregado sintoma<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Sintoma</th>
										<th>Selección</th>
										<th>Descripción</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($sintoma)) {
						echo <<<CODIGO

						<tr>
							<td><span class="badge badge-blue">{$fila['id']}</span></td>
							<td>{$fila['sintoma']}</td>
							<td><input type="checkbox" value="{$fila['id']}" name="sintomas[]" id="{$fila['id']}" /></td>
							<td><label for={$fila['id']}>{$fila['descripcion']}</label></td>

						</tr>

CODIGO;
						}
					}

				?>

		</table>