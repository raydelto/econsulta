<?php
	include "libreria/engine.php";

	$eliminar ="";
	$Paciente = new Paciente();

	if(isset($_POST['modal_paciente'])){
		$Paciente->id = $_POST['id'];
		$Paciente->cedula = $_POST['cedula'];
		$Paciente->nombre = $_POST['nombre'];
		$Paciente->apellido_paterno = $_POST['apellido_paterno'];
		$Paciente->apellido_materno = $_POST['apellido_materno'];
		$Paciente->estado_civil = $_POST['estado_civil'];
		$Paciente->fecha_nacimiento = $_POST['fecha_nacimiento'];
		$Paciente->telefono = $_POST['telefono'];
		$Paciente->sexo = $_POST['sexo'];
		$Paciente->direccion = $_POST['direccion'];
		$Paciente->observacion = $_POST['observacion'];
		$Paciente->guardar();
		//header("Location:mantenimientoPacientes.php");
		


	}else if(isset($_GET['edit'])){
		$Paciente->id = $_GET['edit'];
		$Paciente->cargar();
	
	}else if(isset($_GET['del'])){
		$Paciente->eliminar($_GET['del']);
		if($eliminar != ""){

		}
	}
?>
<script>
$('form.ajax').on('submit',function(){
	var id = "";
	var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};

	that.find('[name]').each(function(index, value){
		var that = $(this),
			name = that.attr('name'),
			value = that.val();

		data[name] = value;


	});

	$.ajax({
		url: url,
		type: type,
		data: data,
		success: function(response){
		/*	console.log(response);*/
			that.prepend()[0].reset();
		}
	});

	alert("Contacto agregado");
	console.log(data['cedula']);
	return false;
});






</script>


<fieldset>
	<legend align="center">Mantenimiento de Pacientes</legend>
	<form  action="gestionDeVisitas.php" class="ajax" method="post">
		
		<table class="unit-centered">
			<tr>
				<!-- <td class="right">ID</td> -->
				<td><input type="hidden" name="id" value="<?php echo $Paciente->id ?>"></td>
			</tr>

			<tr>
				<td class="right">Cedula</td>
				<td><input type="text" name="cedula" maxlength="14" maxlength="11" placeholder="001-0000000-1" required value="<?php echo $Paciente->cedula ?>"></td>
			</tr>

			<tr>
				<td class="right">Nombre</td>
				<td><input type="text" name="nombre" required value="<?php echo $Paciente->nombre ?>"></td>
			</tr>
			<tr>
				<td class="right">Apellido Paterno</td>
				<td><input type="text" name="apellido_paterno" value="<?php echo $Paciente->apellido_paterno ?>"></td>
			</tr>
			<tr>
				<td class="right">Apellido Materno</td>
				<td><input type="text" name="apellido_materno" value="<?php echo $Paciente->apellido_materno ?>"></td>
			</tr>
			
			<tr>
				<td class="right">Estado Civil</td>
				<td>
					<select  required name="estado_civil">
							<?php 
								$soltero = "";
								$casado = "";
								echo $Paciente->estado_civil;
								if($Paciente->estado_civil == "Soltero"){
									$soltero = "selected";
								}else if($Paciente->estado_civil == "Casado"){
									$casado = "selected";
								}
								
							 ?>
							 <option value='' >Estado Civíl</option>
							 <option <?= $soltero ?> value="Soltero">Soltero (a)</option>
							 <option <?= $casado ?> value="Casado">Casado (a)</option>
						
					</select>

				</td>
			</tr>

			<tr>
				<td class="right">Fecha Nacimiento</td>
				<td><input type="date" name="fecha_nacimiento" required value="<?php echo $Paciente->fecha_nacimiento ?>"></td>
			</tr>
			
			<tr>
				<td class="right">Teléfono</td>
				<td><input type="tel" name="telefono"  value="<?php echo $Paciente->telefono ?>"></td>
			</tr>
			
			<tr>
				<td class="right">Sexo</td>

				<td >
					<input type="radio" name="sexo" required value="Masculino" <?php echo ($Paciente->sexo == 'Masculino')?'checked':'';?>> Masculino
					<input type="radio" name="sexo" required value="Femenino" <?php echo ($Paciente->sexo == 'Femenino')?'checked':'';?>> Femenino
				</td>
			</tr>

			<tr>
				<td class="right">Dirección</td>
				<td><input type="text" name="direccion" required value="<?php echo $Paciente->direccion ?>"></td>
			</tr>

			<tr>
				<td class="right">Ocupación</td>
				<!-- Cambiarle el nombre (name) -->
				<td><input type="text" name="observacion" required value="<?php echo $Paciente->observacion ?>"></td>
			
			</tr>

			<tr>
			
				<td class="right"><input class=" btn "type="submit" name="modal_paciente"value="Enviar"></td>
				<td><a class="btn btn-green" onClick="document.getElementById('show-modal').click();">Nuevo</a></td>
			</tr>

		</table>
	</form>

</fieldset>

	<!-- <table class="table-bordered unit-centered table-hovered">
			
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
										<th>Apellido</th>
										<th>Est. Civil</th>
										<th>Fecha de Nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Dirección</th>
										<th>Ocupación</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Paciente)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['cedula']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['apellido_paterno']} {$fila['apellido_materno']}</td>
							<td>{$fila['estado_civil']}</td>
							<td>{$fila['fecha_nacimiento']}</td>
							<td>{$fila['telefono']}</td>
							<td>{$fila['sexo']}</td>
							<td>{$fila['direccion']}</td>
							<td class="width-15">{$fila['observacion']}</td>
							
							
						</tr>	

CODIGO;
						}
					}
				
				?>
		
		</table> -->


<!-- 
		<td><a href='mantenimientoPacientes.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea borrar este Paciente?');" href='mantenimientoPacientes.php?del={$fila['id']}'>Eliminar</a></td> -->
