<?php
	include 'plantilla.php';
	include 'submenu.php';

	$tratamiento = new tratamiento();
	if($_POST){
		$tratamiento->id = $_POST['id'];
		$tratamiento->tratamiento = $_POST['tratamiento'];
		header("Location:tratamiento.php");
		$tratamiento->guardar();
		
	}else if(isset($_GET['edit'])){
		$tratamiento->id = $_GET['edit'];
		$tratamiento->cargar();
	
	}else if(isset($_GET['del'])){
		$tratamiento->eliminar($_GET['del']);
	}
	

?>


<fieldset>
	<legend align="center">Mantenimiento de tratamiento</legend>
	<form action="tratamiento.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id" required value="<?php echo $tratamiento->id ?>">
			</tr>
			<tr>
				<td class="right">Tratamiento</td>
				<td><textarea name="tratamiento" required rows="4" class="width-60"><?php echo $tratamiento->tratamiento ?></textarea></td>

			</tr>
			
			<tr>
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="tratamiento.php">Nuevo</a></td>
			</tr>

		</table>
	</form>

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
										<th>tratamiento</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($tratamiento)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['tratamiento']}</td>
							
							<td><a href='tratamiento.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este tratamiento?');" href='tratamiento.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
