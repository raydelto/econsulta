<?php
	include 'plantilla.php';
	include 'tipoPrueba_funciones.php';
	$tipoPrueba = new tipoPrueba();
	if($_POST){
		$tipoPrueba->id = $_POST['id'];
		$tipoPrueba->tipo_prueba = $_POST['tipo_prueba'];
		header("Location:tipoPrueba.php");
		$tipoPrueba->guardar();
		
	}else if(isset($_GET['edit'])){
		$tipoPrueba->id = $_GET['edit'];
		$tipoPrueba->cargar();
	
	}else if(isset($_GET['del'])){
		$tipoPrueba->eliminar($_GET['del']);
	}
	

?>



<fieldset>
	<legend align="center">Mantenimiento de tipoPrueba</legend>
	<form action="tipoPrueba.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id"  value="<?php echo $tipoPrueba->id ?>">
			</tr>
			<tr>
				<td class="right">Tipo De Prueba</td>
				<td><input type="text" name="tipo_prueba" class="success" required value="<?php echo $tipoPrueba->tipo_prueba ?>"></td>
			</tr>
			
			
			<tr>
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="tipoPrueba.php">Nuevo</td>
			</tr>

		</table>
	</form>

</fieldset>


	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					 $tipoPrueba = tipoPrueba::listadoTipoPrueba();
					if(mysqli_num_rows($tipoPrueba) < 1){
						echo "<center><h4>Aún no se han agregado tipos de prueba<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>tipo_prueba</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($tipoPrueba)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['tipo_prueba']}</td>
							
							<td><a href='tipoPrueba.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este tipoPrueba?');" href='tipoPrueba.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
