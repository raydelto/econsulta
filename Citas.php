<?php
	include 'plantilla.php';

	
	$Cita = new Cita();
	if($_POST){
		$Cita->id = $_POST['id'];
		$Cita->id_paciente = $_POST['id_paciente'];
		$Cita->fecha = $_POST['fecha'];
		$Cita->hora = $_POST['hora'];
		
		$Cita->guardar();
		//header("Location:Citas.php");
	}else if(isset($_GET['edit'])){
		$Cita->id = $_GET['edit'];
		$Cita->cargar();
	
	}else if(isset($_GET['del'])){
		$Cita->eliminar($_GET['del']);
		
	}
?>

<p align="center"><a href="buscarCitas.php" class="btn btn-green ">Nueva Cita</a></p>

<fieldset>
	<legend align="center">Listado de Citas</legend>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					$Cita = Cita::listadoCita();
					$cantidad = Cita::cantidadCitasHoy();
					$hoy = "";
					$fecha = date("Y-m-d");
					
					if(mysqli_num_rows($Cita) < 1){
						echo "<center><h4>Aún no se han agregado Citas<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>ID Paciente</th>
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Cita)) {
						
						
						if($fila['fecha'] == $fecha){
							$hoy = "style='background: #DFDFDF;'";
						}else{
							$hoy = "";
						}
						echo <<<CODIGO

						<tr {$hoy}>
							<td>{$fila['id']}</td>
							<td>{$fila['id_paciente']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['fecha']}</td>
							<td>{$fila['hora']}</td>
							
							<td><a href='mantenimientoCitas.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar esta Cita?');" href='Citas.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
						
CODIGO;
						}
						if(mysqli_num_rows($cantidad) > 0){
									while($fila = mysqli_fetch_assoc($cantidad)){
						echo "
							<tr>
								<td colspan='5'>Total de citas</td>
								<td>
										{$fila['cantidad']}										
								</td>
							</tr>
						";

							}
						}
						

					}
				
				?>
		
		</table>


</fieldset>

	