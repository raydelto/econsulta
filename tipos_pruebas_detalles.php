<?php
	include 'plantilla.php';


$consulta_id = $_GET['id'];


$tipos_pruebas_detalles_funciones = new tipos_pruebas_detalles_funciones();
$tipo_prueba = "";
if(isset($_GET['tipo_prueba'])){
	$tipo_prueba = $_GET['tipo_prueba'];

	foreach ($tipo_prueba as $key => $tipoPrueb) {
		$id_tipo_prueba = $tipo_prueba[$key];

		$tipos_pruebas_detalles_funciones->id = 0; 
		$tipos_pruebas_detalles_funciones->id_tipo_prueba = $id_tipo_prueba; 
		$tipos_pruebas_detalles_funciones->id_consulta = $consulta_id; 
		$tipos_pruebas_detalles_funciones->guardar();

	}

}
if($tipo_prueba != null){
	header("Location:consulta_terminada.php");
}


?>


<fieldset>
	<legend align="center">Mantenimiento de Tipo prueba</legend>
	<form action="consulta_terminada.php" method="get" autocomplete="off">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id" >
			</tr>
			<tr>
				<td class="centers">
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
				</td>
			</tr>

			<tr>
				<td class="right">Tipo prueba</td>
				<td><input class=" btn "type="submit" value="Enviar"></td>
			</tr>
			
		</table>
	
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
										<th>Selección</th>
										<th>Tipo de prueba</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($tipoPrueba)) {
						echo <<<CODIGO

						<tr>
							<td class="width-10">{$fila['id']}</td>
							<td class="width-10"><input type="checkbox" value="{$fila['id']}" name="tipo_prueba[]" id="{$fila['id']}" /></td>
							<td><label for={$fila['id']}>{$fila['tipo_prueba']}<label></td>
							
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
