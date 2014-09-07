<?php
	include 'plantilla.php';

	include 'mantenimientoCitas_funciones.php';
	$Cita = new Cita();
	if($_POST){
		$Cita->id = $_POST['id'];
		$Cita->id_paciente = $_POST['id_paciente'];
		$Cita->fecha = $_POST['fecha'];
		$Cita->hora = $_POST['hora'];
		$Cita->doctor = $_POST['doctor'];
		$Cita->guardar();
		//header("Location:mantenimientoCitas.php");
	}else if(isset($_GET['edit'])){
		$Cita->id = $_GET['edit'];
		$Cita->cargar();
	
	}else if(isset($_GET['del'])){
		$Cita->eliminar($_GET['del']);
	}
	

?>




<fieldset>
	<legend align="center">Mantenimiento de Citas</legend>
	<form action="mantenimientoCitas.php" method="post">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<td><input type="hidden" name="id" value="<?php echo $Cita->id ?>"></td>
			</tr>
			<tr>
				<td>ID Paciente</td>
				<td><input type="text" name="id_paciente" value="<?php echo $Cita->id_paciente ?>"></td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="fecha" value="<?php echo $Cita->fecha ?>"></td>
			</tr>
			<tr>
				<td>Hora</td>
				<td><input <input type="time" name="hora" value="<?php echo $Cita->hora ?>"></td>
			</tr>

			<tr>
				<td>Doctor (a)</td>
				<td><input type="text" name="doctor" value="<?php echo $Cita->doctor ?>"></td>
			</tr>
			
			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="mantenimientoCitas.php">Nuevo</td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					$Cita = Cita::listadoCita();
					if(mysqli_num_rows($Cita) < 1){
						echo "<center><h4>Aún no se han agregado Citas<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>ID Paciente</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Doctor</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Cita)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['id_paciente']}</td>
							<td>{$fila['fecha']}</td>
							<td>{$fila['hora']}</td>
							<td>{$fila['doctor']}</td>
							
							<td><a href='mantenimientoCitas.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar esta Cita?');" href='mantenimientoCitas.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
