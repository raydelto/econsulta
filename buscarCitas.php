<?php
	include 'plantilla.php';
	include 'mantenimientoCitas_funciones.php';
	include 'mantenimientoPaciente_funciones.php';

	$valor = "";
	$tipoBusqueda = "";

	if($_POST){
		if(!empty($_POST['cedula'])){
			$valor = $_POST['cedula'];
			$tipoBusqueda = "cedula";
		}else if(!empty($_POST['nombre'])){
			$valor = $_POST['nombre'];
			$tipoBusqueda = "nombre";
		}else if(!empty($_POST['apellido'])){
			$valor = $_POST['apellido'];
			$tipoBusqueda = "apellido";
		}
	}

?>

<fieldset class="centrarGrupo">
	<legend align="center">Buscar Paciente</legend>

	<form action="buscarCitas.php" method="post" autocomplete="off">
		<table class="centrarTabla">
			<caption>Buscar por:</caption>
			<tr>
				<td>Cedula:</td>
				<td><input type="text" name="cedula" placeholder="001-0000000-1" value="<?php  if(isset($_POST['cedula'])) echo $_POST['cedula'];?>" placeholder=""></td>
			</tr>

			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="nombre" placeholder="Pedro" value="<?php  if(isset($_POST['nombre'])) echo $_POST['nombre'];?>" placeholder=""></td>
			</tr>

			<tr>
				<td>Apellido:</td>
				<td><input type="text" name="apellido" value="<?php  if(isset($_POST['apellido'])) echo $_POST['apellido'];?>" placeholder="Pérez" placeholder=""></td>
			</tr>

			<tr>
				<td><input type="submit" class="btn btn-green btnBuscar" value="Buscar" placeholder=""></td>
				<td><a href="mantenimientoPacientes.php" class="btn btn-black">Registrar Paciente</a></td>
				
			</tr>
			<tr>
				<td><a href="buscarCitas.php" class="btn">Nueva Busqueda</a></td>
				<td><a href="Citas.php" class="btn btnVolverAncho">Volver</a></td>
			</tr>
		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered tablaPacienteHover">
			
				<?php 
				if($valor == ""){

		
				?>
				<?php 
					$Paciente = Paciente::listadoPaciente();
					if(mysqli_num_rows($Paciente) < 1){
						echo "<center><h4>Aún no se han agregado Paciente<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Fecha de Nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Dirección</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Paciente)) {
						echo <<<LISTA
						<tr onclick="mantenimientoCitas({$fila['id']})">
							<td>{$fila['id']}</td>
							<td>{$fila['cedula']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['apellido_paterno']} {$fila['apellido_materno']}</td>
							<td>{$fila['fecha_nacimiento']}</td>
							<td>{$fila['telefono']}</td>
							<td>{$fila['sexo']}</td>
							<td>{$fila['direccion']}</td>
							
							
						</tr>	
LISTA;
						}
					}
				
				?>
		
		</table>
		<?php

				}else{
					$Cita = Cita::buscarPaciente($valor,$tipoBusqueda);
					if(mysqli_num_rows($Cita) < 1){

						if($tipoBusqueda == "cedula"){
							//Arreglar para cuando no hayan contactos agregados
								echo "<center><h3 style='color:red;'>No se encontró ningúna {$tipoBusqueda} que contenga '{$valor}'<h3></center>";
						}else{
								echo "<center><h3 style='color:red;'>No se encontró ningún {$tipoBusqueda} que contenga '{$valor}'<h3></center>";
						}

					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Fecha de Nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Dirección</th>
										
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Cita)) {
						echo <<<CODIGO

						<tr onclick="mantenimientoCitas({$fila['id']})">
							<td>{$fila['id']}</td>
							<td>{$fila['cedula']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['apellidos']}</td>
							<td>{$fila['fecha_nacimiento']}</td>
							<td>{$fila['telefono']}</td>
							<td>{$fila['sexo']}</td>
							<td>{$fila['direccion']}</td>
							
CODIGO;
						}
					}
				}//fin if
				?>
		
		</table>

