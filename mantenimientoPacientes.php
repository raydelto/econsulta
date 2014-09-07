<?php
	include 'plantilla.php';

	include 'mantenimientoPaciente_funciones.php';
	$Paciente = new Paciente();
	if($_POST){
		$Paciente->id = $_POST['id'];
		$Paciente->cedula = $_POST['cedula'];
		$Paciente->nombre = $_POST['nombre'];
		$Paciente->apellido_paterno = $_POST['apellido_paterno'];
		$Paciente->apellido_materno = $_POST['apellido_materno'];
		$Paciente->fecha_nacimiento = $_POST['fecha_nacimiento'];
		$Paciente->telefono = $_POST['telefono'];
		$Paciente->sexo = $_POST['sexo'];
		$Paciente->direccion = $_POST['direccion'];
		$Paciente->guardar();
		//header("Location:mantenimientoPacientes.php");
	}else if(isset($_GET['edit'])){
		$Paciente->id = $_GET['edit'];
		$Paciente->cargar();
	
	}else if(isset($_GET['del'])){
		$Paciente->eliminar($_GET['del']);
	}
?>

<fieldset>
	<legend align="center">Mantenimiento de Pacientes</legend>
	<form action="mantenimientoPacientes.php" method="post">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<td><input type="hidden" name="id" value="<?php echo $Paciente->id ?>"></td>
			</tr>

			<tr>
				<td>Cedula</td>
				<td><input type="text" name="cedula" maxlength="13" maxlength="11" placeholder="Ejem: 01-00000000-0" required value="<?php echo $Paciente->cedula ?>"></td>
			</tr>

			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $Paciente->nombre ?>"></td>
			</tr>
			<tr>
				<td>Apellido Paterno</td>
				<td><input type="text" name="apellido_paterno" value="<?php echo $Paciente->apellido_paterno ?>"></td>
			</tr>
			<tr>
				<td>Apellido Materno</td>
				<td><input type="text" name="apellido_materno" value="<?php echo $Paciente->apellido_materno ?>"></td>
			</tr>
			
			<tr>
				<td>Fecha Nacimiento</td>
				<td><input type="date" name="fecha_nacimiento" value="<?php echo $Paciente->fecha_nacimiento ?>"></td>
			</tr>
			
			<tr>
				<td>Teléfono</td>
				<td><input type="tel" name="telefono" value="<?php echo $Paciente->telefono ?>"></td>
			</tr>
			
			<tr>
				<td>Sexo</td>

				<td>
					<input type="radio" name="sexo" value="Masculino" <?php echo ($Paciente->sexo == 'Masculino')?'checked':'';?>> Masculino
					<input type="radio" name="sexo" value="Femenino" <?php echo ($Paciente->sexo == 'Femenino')?'checked':'';?>> Femenino
				</td>
			</tr>

			<tr>
				<td>Dirección</td>
				<td><input type="text" name="direccion" value="<?php echo $Paciente->direccion ?>"></td>
			</tr>

			<tr>
				<td><input  class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="mantenimientoPacientes.php">Nuevo</td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					$Paciente = Paciente::listadoPaciente();
					if(mysqli_num_rows($Paciente) < 1){
						echo "<center><h4>Aún no se han agregado Paciente<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido Pataterno</th>
										<th>Apellido Mataterno</th>
										<th>Fecha de Nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Dirección</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Paciente)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['cedula']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['apellido_paterno']}</td>
							<td>{$fila['apellido_materno']}</td>
							<td>{$fila['fecha_nacimiento']}</td>
							<td>{$fila['telefono']}</td>
							<td>{$fila['sexo']}</td>
							<td>{$fila['direccion']}</td>
							
							<td><a href='mantenimientoPacientes.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea borrar este Paciente?');" href='mantenimientoPacientes.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
