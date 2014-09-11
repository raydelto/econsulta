<?php
include 'plantilla.php';



$gestionVisita = new gestionVisita();
if($_POST){
	$gestionVisita->id = $_POST['id'];
	$gestionVisita->id_paciente = $_POST['id_paciente'];
	$gestionVisita->fecha = $_POST['fecha'];
	$gestionVisita->hora = $_POST['hora'];
	$gestionVisita->nota_medica = $_POST['nota_medica'];
	$gestionVisita->diagnostico = $_POST['diagnostico'];
	$gestionVisita->tratamiento = $_POST['tratamiento'];
	$gestionVisita->medicamento = $_POST['medicamento'];

	header("Location:gestionDeVisitas.php");
	$gestionVisita->guardar();
	
}else if(isset($_GET['edit'])){
	$gestionVisita->id = $_GET['edit'];
	$gestionVisita->cargar();

}else if(isset($_GET['del'])){
	$gestionVisita->eliminar($_GET['del']);
}


	$fecha = date("Y-m-d");
	$hora = date("H:i:s");
	$fechaActual = "";
	$horaActual = "";

		if($gestionVisita->fecha == ""){
			$fechaActual = $fecha;
		}else{
			$fechaActual = $gestionVisita->fecha;
		}

		if($gestionVisita->hora == ""){
			$horaActual = $hora;
		}else{
			$horaActual = $gestionVisita->hora;
		}


?>



<fieldset>
	<legend align="center">Mantenimiento de gestionVisita</legend>
	<form action="gestionDeVisitas.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id" required value="<?php echo $gestionVisita->id ?>">
			</tr>
			<tr>
				<td class="right">id_paciente</td>
				<td><input type="text" name="id_paciente" required value="<?php echo $gestionVisita->id_paciente ?>"></td>
			</tr>
			<tr>
				<td class="right">fecha</td>

				<td><input type="text" name="fecha" required value="<?= $fechaActual; ?>"></td>


			</tr>
			<tr>
				<td class="right">hora</td>
				<td><input type="text" name="hora" required value="<?= $horaActual; ?>"></td>
			</tr>

			<tr>
				<td class="right">Nota Médica</td>
				<td><textarea required name="nota_medica" rows="4" class="width-50"><?php echo $gestionVisita->nota_medica ?></textarea></td>
			</tr>

			<tr>
				<td class="right">diagnostico</td>
				<td><input type="text" name="diagnostico" required value="<?php echo $gestionVisita->diagnostico ?>"></td>
			</tr>

			<tr>
				<td class="right">tratamiento</td>
				<td><input type="text" name="tratamiento" required value="<?php echo $gestionVisita->tratamiento ?>"></td>
			</tr>

			<tr>
				<td class="right">medicamento</td>
				<td><input type="text" name="medicamento" required value="<?php echo $gestionVisita->medicamento ?>"></td>
			</tr>

			
			<tr>
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="gestionDeVisitas.php">Nuevo</td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					 $gestionVisita = gestionVisita::listadoGestionVisita();
					if(mysqli_num_rows($gestionVisita) < 1){
						echo "<center><h4>Aún no se han agregado gestionVisita<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>ID Paciente</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Nota Médica</th>
										<th>Diagnostico</th>
										<th>Tratamiento</th>
										<th>Medicamento</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($gestionVisita)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['id_paciente']}</td>
							<td>{$fila['fecha']}</td>
							<td>{$fila['hora']}</td>
							<td>{$fila['nota_medica']}</td>
							<td>{$fila['diagnostico']}</td>
							<td>{$fila['tratamiento']}</td>
							<td>{$fila['medicamento']}</td>
							
							<td><a href='gestionDeVisitas.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este gestionVisita?');" href='gestionDeVisitas.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>




