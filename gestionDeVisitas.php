
<?php
include 'plantilla.php';

$gestionDeVisitas = new gestionDeVisitas();
if($_POST){
	$gestionDeVisitas->id_consulta = $_POST['id_consulta'];
	$gestionDeVisitas->id_paciente = $_POST['id_paciente'];
	$gestionDeVisitas->fecha = $_POST['fecha'];
	$gestionDeVisitas->hora = $_POST['hora'];
	$gestionDeVisitas->motivo_consulta = $_POST['motivo_consulta'];
	$gestionDeVisitas->fuma = isset($_POST['fuma']);
	$gestionDeVisitas->alcohol = isset($_POST['alcohol']);
	$gestionDeVisitas->cafe = isset($_POST['cafe']);
	$gestionDeVisitas->observacion = $_POST['observacion'];
	
	//header("Location:gestionDeVisitas.php");
	$gestionDeVisitas->guardar();
	
}else if(isset($_GET['edit'])){
	$gestionDeVisitas->id_consulta = $_GET['edit'];
	$gestionDeVisitas->cargar();

}else if(isset($_GET['del'])){
	$gestionDeVisitas->eliminar($_GET['del']);
}


	$fecha = date("Y-m-d");
	$hora = date("H:i:s");
	$fechaActual = "";
	$horaActual = "";

		if($gestionDeVisitas->fecha == ""){
			$fechaActual = $fecha;
		}else{
			$fechaActual = $gestionDeVisitas->fecha;
		}

		if($gestionDeVisitas->hora == ""){
			$horaActual = $hora;
		}else{
			$horaActual = $gestionDeVisitas->hora;
		}

		$ultimo_id = gestionDeVisitas::ultimoId("SELECT LAST_INSERT_ID() as ultimo_id");
		
		//var_dump($ultimo_id);
		if($ultimo_id !=0){
			header("Location:sintomas_detalle.php?id={$ultimo_id}");
		}



?>


	
		<button class="btn center" id="show-modal"
			    data-tools="modal" data-width="1204" data-title="Registrar Paciente" data-content="modal_pacientes.php">
			    Registrar Paciente
		</button>
	
	

<fieldset>
	<legend align="center">Mantenimiento de gestionDeVisitas</legend>
	<form action="gestionDeVisitas.php" class="form1" method="post" autocomplete="off">
		<table class="unit-centered">

			
			<tr>
				<td class="right">Paciente</td>
				
				<td>

					<select name="id_paciente" required>
							<option value = "">Paciente</option>
							<?php
								$paciente = Paciente::listadoPaciente();
								
								$selected = "";


								if(mysqli_num_rows($paciente) > 0){
									while($fila = mysqli_fetch_assoc($paciente)){
										if($gestionDeVisitas->id_paciente == $fila['id']){
											$selected = "selected";
										}else{
											$selected = "";
										}
										echo "<option {$selected} value='{$fila['id']}'>{$fila['id']} - {$fila['nombre']} {$fila['apellido_paterno']} {$fila['apellido_materno']}</option>";
									}
								}

								
							?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="right">Fecha</td>
				<td><input type="date" name="fecha" required value="<?= $fechaActual; ?>"></td>
			</tr>

			<tr>
				<td class="right">Hora</td>
				<td><input type="time" name="hora" required value="<?= $horaActual ?>"></td>
			</tr>
			
			<tr>
				<td class="right">Motivo De Consulta</td>
				<td><textarea required name="motivo_consulta" class="width-60" rows="4"><?php echo $gestionDeVisitas->motivo_consulta ?></textarea></td>
			</tr>
			
			<tr>
				<td class="right">Fuma</td>
				<td><input type="checkbox" name="fuma"  value="1" <?php echo ($gestionDeVisitas->fuma == '1')? 'checked':''; ?>></td>
					
			</tr>
			
			<tr>
				<td class="right">Alcohol</td>
				<td><input type="checkbox" name="alcohol"  value="1" <?php echo ($gestionDeVisitas->alcohol == '1')? 'checked':''; ?>></td>
			</tr>
			
			<tr>
				<td class="right">Cafe</td>
				<td><input type="checkbox" name="cafe"  value="1" <?php echo ($gestionDeVisitas->cafe == '1')? 'checked':''; ?>></td>
			</tr>

			<tr>
				<td class="right">Observación</td>
				<td><textarea  name="observacion" class="width-60" rows="4"><?php echo $gestionDeVisitas->observacion ?></textarea></td>
			</tr>
			
			<tr>
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				
			</tr>

		</table>
	</form>

</fieldset>

