<?php
	include 'plantilla.php';
	$sintoma = new sintoma();
	if($_POST){
		$sintoma->id = $_POST['id'];
		$sintoma->sintoma = $_POST['sintoma'];
		$sintoma->descripcion = $_POST['descripcion'];
		$sintoma->guardar();
		//header("Location:sintoma.php");
	}else if(isset($_GET['edit'])){
		$sintoma->id = $_GET['edit'];
		$sintoma->cargar();
	
	}else if(isset($_GET['del'])){
		$sintoma->eliminar($_GET['del']);
	}
	

?>



<fieldset>
	<legend align="center">Mantenimiento de sintoma</legend>
	<form action="sintoma.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<td><input type="hidden" name="id" required value="<?php echo $sintoma->id ?>"></td>
			</tr>
			<tr>
				<td class="right">sintoma</td>
				<td><input type="text" name="sintoma" required value="<?php echo $sintoma->sintoma ?>"></td>
			</tr>
			
			<tr>
				<td class="right">Descripción</td>
				<td>
					<textarea name="descripcion" rows="4" class="width-40" required ><?php echo $sintoma->descripcion ?></textarea>
				</td>
			</tr>

			<tr>
				<td class="right"><input class="btn"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="sintoma.php">Nuevo</td>
			</tr>

		</table>
	</form>

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
										<th>Descripción</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($sintoma)) {
						echo <<<CODIGO

						<tr>
							<td><span class="badge badge-blue">{$fila['id']}</span></td>
							<td>{$fila['sintoma']}</td>
							<td>{$fila['descripcion']}</td>
							
							<td><a href='sintoma.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este sintoma?');" href='sintoma.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
