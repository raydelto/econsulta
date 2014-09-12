<?php

include 'plantilla.php';


$diagnostico = new diagnostico();
if($_POST){
	$diagnostico->id = $_POST['id'];
	$diagnostico->diagnostico = $_POST['diagnostico'];
	header("Location:diagnostico.php");
	$diagnostico->guardar();
	
}else if(isset($_GET['edit'])){
	$diagnostico->id = $_GET['edit'];
	$diagnostico->cargar();

}else if(isset($_GET['del'])){
	$diagnostico->eliminar($_GET['del']);
}


	

?>



<fieldset>
	<legend align="center">Mantenimiento de diagnostico</legend>
	<form action="diagnostico.php" method="post" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id" required value="<?php echo $diagnostico->id ?>">
			</tr>
			<tr>
				<td class="right">diagnostico</td>
				<td><textarea required rows="4" class="width-50" name="diagnostico"><?php echo $diagnostico->diagnostico ?></textarea></td>

			</tr>
			
			<tr>
				<td class="right"><input class=" btn "type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="diagnostico.php">Nuevo</a></td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					 $diagnostico = diagnostico::listadoDiagnostico();
					if(mysqli_num_rows($diagnostico) < 1){
						echo "<center><h4>Aún no se han agregado diagnostico<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>diagnostico</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($diagnostico)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['diagnostico']}</td>
							
							<td class="width-20"><a href='diagnostico.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este diagnostico?');" href='diagnostico.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
