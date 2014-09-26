<?php

include 'plantilla.php';

$consulta_id = $_GET['id'];
/*

 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS
 	CAMBIA EL NOMBDE DEL DOCUMENTO QUES TRATAMIENTO NO RECETAS



*/
$tratamiento = '';
$receta_detalles_funciones = new receta_detalles_funciones();
if(isset($_GET['tratamiento'])){
	$tratamiento = $_GET['tratamiento'];


	foreach ($tratamiento as $key => $trat) {
		$id_medicamento = $tratamiento[$key];
		
		$receta_detalles_funciones->id = 0; //por que será autoingrement
		$receta_detalles_funciones->id_medicamento = $id_medicamento; //id de cada diagnostico
		$receta_detalles_funciones->id_consulta = $consulta_id; 
		$receta_detalles_funciones->guardar();

	}

if($tratamiento != null){

	header("Location:tratamiento_detalles.php?id={$consulta_id}");
}

}

?>

<fieldset>
	<legend align="center">Selección de medicamentos</legend>
	<form action="recetas_detalles.php" method="get" autocomplete="off">
		<table class="unit-centered">
			
			<tr>
				
					<input type="hidden" value="<?php echo $consulta_id;?>" name="id">
				
			</tr>
			<tr>
				<td></td>
			</tr>

			
			
			<tr>
				<td class="text-centered"><input class=" btn "type="submit" value="Enviar"></td>
				
			</tr>

		</table>
	

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					 $tratamien = tratamiento::listadoTratamiento();
					
					if(mysqli_num_rows($tratamien) < 1){
						echo "<center><h4>Aún no se han agregado tratamiento<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Medicamento</th>
										<th>Nombre Comercial</th>
										<th>Nombre Genérico</th>
										<th>Descripcion</th>
										<th>contraindicaciones</th>
										<th>presentacion</th>
										<th>laboratorio</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($tratamien)) {
						echo <<<CODIGO

						<tr>
							<td><span class="badge badge-blue">{$fila['id']}</span></td>
							
							<td><input type="checkbox" value="{$fila['id']}" name="tratamiento[]" id="{$fila['id']}" /></td>
							<td><label for={$fila['id']}>{$fila['nombre_comercial']}<label></td>
							<td><label for={$fila['id']}>{$fila['nombre_generico']}<label></td>
							<td><label for={$fila['id']}>{$fila['descripcion']}<label></td>
							<td><label for={$fila['id']}>{$fila['contraindicaciones']}<label></td>
							<td><label for={$fila['id']}>{$fila['presentacion']}<label></td>
							<td><label for={$fila['id']}>{$fila['laboratorio']}<label></td>
							
							
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>
