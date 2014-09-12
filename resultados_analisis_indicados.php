<?php
	include 'plantilla.php';
	
	$resultados_analisis_indicados = new resultados_analisis_indicados();
	if($_POST){
		$resultados_analisis_indicados->id = $_POST['id'];
		$resultados_analisis_indicados->id_prueba = $_POST['id_prueba'];
		$resultados_analisis_indicados->id_paciente = $_POST['id_paciente'];
		$resultados_analisis_indicados->resultados = $_POST['resultados'];
		$resultados_analisis_indicados->fecha = $_POST['fecha'];
		$resultados_analisis_indicados->hora = $_POST['hora'];
		header("Location:resultados_analisis_indicados.php");
		$resultados_analisis_indicados->guardar();
		
	}else if(isset($_GET['edit'])){
		$resultados_analisis_indicados->id = $_GET['edit'];
		$resultados_analisis_indicados->cargar();
	
	}else if(isset($_GET['del'])){
		$resultados_analisis_indicados->eliminar($_GET['del']);
	}
	

?>



<fieldset>
	<legend align="center">Mantenimiento de resultados_analisis_indicados</legend>
	<form action="resultados_analisis_indicados.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id" required value="<?php echo $resultados_analisis_indicados->id ?>">
			</tr>
			<tr>
				<td class="right">id_prueba</td>
				<td>
					<select name="id_prueba" required>
						<option value = "">Prueba</option>
						<?php
							$tipoPrueba = prueba_laboratorio::listadoTipoPrueba2();
							
							$selected = "";


							if(mysqli_num_rows($tipoPrueba) > 0){
								while($fila = mysqli_fetch_assoc($tipoPrueba)){
									if($resultados_analisis_indicados->id_prueba == $fila['id']){
										$selected = "selected";
									}else{
										$selected = "";
									}
									echo "<option {$selected} value='{$fila['id']}'>{$fila['tipo_prueba']}</option>";
								}
							}

							
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="right">id_paciente</td>
				
				<td>
					<select name="id_paciente" required>
						<option value = "">Paciente</option>
						<?php
							$paciente = Paciente::listadoPaciente();
							
							$selected = "";


							if(mysqli_num_rows($paciente) > 0){
								while($fila = mysqli_fetch_assoc($paciente)){
									if($resultados_analisis_indicados->id_paciente == $fila['id']){
										$selected = "selected";
									}else{
										$selected = "";
									}
									echo "<option {$selected} value='{$fila['id']}'>{$fila['nombre']} {$fila['apellido_paterno']} {$fila['apellido_materno']}</option>";
								}
							}

							
						?>
					</select>
				</td>


			</tr>
			<tr>
				<td class="right">resultados</td>
				
				<td><textarea required name="resultados" rows="4" class="width-50"><?php echo $resultados_analisis_indicados->resultados ?></textarea></td>
			</tr>

			<tr>
				<td class="right">fecha</td>
				<td><input type="date" name="fecha" required value="<?php echo $resultados_analisis_indicados->fecha ?>"></td>
			</tr>

			<tr>
				<td class="right">hora</td>
				<td><input type="time" name="hora" required value="<?php echo $resultados_analisis_indicados->hora ?>"></td>
			</tr>
			
			<tr>
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="resultados_analisis_indicados.php">Nuevo</a></td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					 $resultados_analisis_indicados = resultados_analisis_indicados::listadoAnalisisIndicados();
					if(mysqli_num_rows($resultados_analisis_indicados) < 1){
						echo "<center><h4>Aún no se han agregado resultados_analisis_indicados<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>ID Prueba</th>
										<th>ID Paciente</th>
										<th>Resultados</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($resultados_analisis_indicados)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['id_prueba']}</td>
							<td>{$fila['id_paciente']}</td>
							<td>{$fila['resultados']}</td>
							<td>{$fila['fecha']}</td>
							<td>{$fila['hora']}</td>
							
							<td><a href='resultados_analisis_indicados.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este resultados_analisis_indicados?');" href='resultados_analisis_indicados.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>

