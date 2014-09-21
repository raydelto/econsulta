<?php
	include 'plantilla.php';
	include 'submenu.php';
	
	$prueba_laboratorio = new prueba_laboratorio();
	if($_POST){
		$prueba_laboratorio->id = $_POST['id'];
		$prueba_laboratorio->prueba = $_POST['prueba'];
		$prueba_laboratorio->id_tipo_prueba = $_POST['id_tipo_prueba'];
		header("Location:prueba_laboratorio.php");
		$prueba_laboratorio->guardar();
		
	}else if(isset($_GET['edit'])){
		$prueba_laboratorio->id = $_GET['edit'];
		$prueba_laboratorio->cargar();
	
	}else if(isset($_GET['del'])){
		$prueba_laboratorio->eliminar($_GET['del']);
	}
	

?>



<fieldset>
	<legend align="center">Mantenimiento de prueba_laboratorio</legend>
	<form action="prueba_laboratorio.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!-- <td>ID</td> -->
				<input type="hidden" name="id" required value="<?php echo $prueba_laboratorio->id ?>">
			</tr>
			<tr>
				<td class="right">Prueba</td>
				<td><input type="text" name="prueba" required value="<?php echo $prueba_laboratorio->prueba ?>"></td>
			</tr>
			<tr>
				<td class="right">Tipo de prueba</td>
				

				<td>
					<select required name="id_tipo_prueba">
					<option value=''>Tipo de prueba</option>
					<option value='' disabled>-</option>
					<?php
						$tipoPrueba = prueba_laboratorio::listadoTipoPrueba2();
						var_dump($tipoPrueba);
						$selected = "";


						if(mysqli_num_rows($tipoPrueba) > 0){
							while($fila = mysqli_fetch_assoc($tipoPrueba)){
								if($prueba_laboratorio->id_tipo_prueba == $fila['id']){
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
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="prueba_laboratorio.php">Nuevo</a></td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					 $prueba_laboratorio = prueba_laboratorio::listadoTipoPrueba();
					if(mysqli_num_rows($prueba_laboratorio) < 1){
						echo "<center><h4>Aún no se han agregado prueba_laboratorio<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Prueba</th>
										<th>Tipo Prueba</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($prueba_laboratorio)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['prueba']}</td>
							<td>{$fila['tipo_prueba']}</td>
							
							<td><a href='prueba_laboratorio.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar esta Prueba De Laboratorio?');" href='prueba_laboratorio.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
