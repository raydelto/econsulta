<?php

include 'plantilla.php';

$consulta_id = $_GET['id'];
$diagno = "";

$diagnostico_detalle_funciones = new diagnostico_detalle_funciones();

if(isset($_GET['diagnosticos'])){
	$diagno = $_GET['diagnosticos'];

	foreach ($diagno as $key => $diag) {
		$id_diagnostico = $diagno[$key];
		
		$diagnostico_detalle_funciones->id = 0; //por que será autoingrement
		$diagnostico_detalle_funciones->id_diagnostico = $id_diagnostico; //id de cada diagnostico
		$diagnostico_detalle_funciones->id_consulta = $consulta_id; 
		$diagnostico_detalle_funciones->guardar();

	}

}

//Pa recetass


if($diagno != null){
	header("Location:recetas_detalles.php?id={$consulta_id}");


}

?>



<fieldset>
	<legend align="center">Seleccionar diagnostico</legend>
	<form action="diagnostico_detalles.php" method="get" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<td colspan="2">
					<input type="hidden" value="<?php echo $consulta_id;?>" name="id">
				</td>
			</tr>

			
			<tr>
				<td class="text-centered"><input class=" btn "type="submit" value="Enviar"></td>
			
			</tr>

		</table>
	

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
										
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($diagnostico)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td><input type="checkbox" value="{$fila['id']}" name="diagnosticos[]" id="{$fila['id']}" /></td>
							<td><label for="{$fila['id']}">{$fila['diagnostico']}</label></td>
							
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
		</form>
