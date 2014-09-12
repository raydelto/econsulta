<?php
	include "libreria/engine.php";


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



<form action="gestionDeVisitas.php" method="get" autocomplete="off">
	<table class="table-bordered unit-centered table-hovered">
	
	
	
			
				<?php 
					 $diagnostico = diagnostico::listadoDiagnostico();
					if(mysqli_num_rows($diagnostico) < 1){
						echo "<center><h4>Aún no se han agregado diagnostico<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Seleccion</th>
										<th>diagnostico</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($diagnostico)) {
						echo <<<CODIGO

						<tr>

							<td>{$fila['id']}</td>
							<td><input type="checkbox" name="diagnostico_check[]" id="{$fila['id']}" value="{$fila['id']}"></td>
							<td><label for="{$fila['id']}">{$fila['diagnostico']}</label></td>
							
							
							
						</tr>	
CODIGO;
						}
					}
				
				?>
				<tr>
					<td><button type="submit">Enviar</button></td>
				</tr>

	</table>
</form>

