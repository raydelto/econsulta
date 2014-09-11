<?php
	include 'plantilla.php';

	
	$Cita = new Cita();
	$readonly = "";
	$titulo = "Mantenimiento de Citas";
	$btnVolver = "Citas.php";

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
	}else if(isset($_GET['id_paciente'])){
		$Cita->id_paciente = $_GET['id_paciente'];
		$readonly = "readonly";
		$titulo = "Agregar Cita";
		$btnVolver = "buscarCitas.php";
		
	}
?>


<fieldset>
	<legend align="center"><?=$titulo?></legend>


<form action="mantenimientoCitas.php" method="post">
		<table class="unit-centered">
		<caption><?=$titulo?></caption>
			<tr>
				<!--<td>ID</td>-->
				<td><input type="hidden" name="id"  required value="<?php echo $Cita->id ?>"></td>
			</tr>
			
			<tr>
				<td>ID Paciente</td>
				<td><input type="text" name="id_paciente" <?php echo $readonly; ?> required value="<?php echo $Cita->id_paciente ?>"></td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="fecha" required value="<?php echo $Cita->fecha ?>"></td>
			</tr>
			<tr>
				<td>Hora</td>
				<td><input <input type="time" name="hora" required value="<?php echo $Cita->hora ?>"></td>
			</tr>
			
			<tr>
				<td><input class=" btn "type="submit" required value="Enviar"></td>
				<td><a class="btn btn-green" href="mantenimientoCitas.php">Nuevo</a></td>
				<td><a class="btn btnVolver" href="<?=$btnVolver?>">Volver</a></td>
			</tr>

		</table>
	</form>
	

</fieldset>