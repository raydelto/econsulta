<?php 

	include 'plantilla.php';
	
	$Medicamentos = new Medicamentos();
	if($_POST){
		$Medicamentos->id = $_POST['id'];
		$Medicamentos->nombre_comercial = $_POST['nombre_comercial'];
		$Medicamentos->nombre_generico = $_POST['nombre_generico'];
		$Medicamentos->descripcion = $_POST['descripcion'];
		$Medicamentos->contraindicaciones = $_POST['contraindicaciones'];
		$Medicamentos->presentacion = $_POST['presentacion'];
		$Medicamentos->laboratorio = $_POST['laboratorio'];
		$Medicamentos->guardar();
		header("Location:Medicamentos.php");
	}else if(isset($_GET['edit'])){
		$Medicamentos->id = $_GET['edit'];
		$Medicamentos->cargar();
	
	}else if(isset($_GET['del'])){
		$Medicamentos->eliminar($_GET['del']);
	}
	
?>



<fieldset>
	<legend>Mantenimiento de Medicamentos</legend>
	<form action="Medicamentos.php" method="post">
		<table class="unit-centered">
			<tr>
				<!--<td>ID</td>-->
				<input type="hidden" name="id" required value="<?php echo $Medicamentos->id ?>">
			</tr>
			<tr>
				<td class="right">Nombre Comercial</td>
				<td><input type="text" name="nombre_comercial" required value="<?php echo $Medicamentos->nombre_comercial ?>"></td>
			</tr>
			<tr>
				<td class="right">nombre_generico</td>
				<td><input type="text" name="nombre_generico" required value="<?php echo $Medicamentos->nombre_generico ?>"></td>
			</tr>
			<tr>
				<td class="right">descripcion</td>
				<td><textarea class="width-40" rows="4" required name="descripcion"><?php echo $Medicamentos->descripcion ?></textarea></td>
			</tr>
			<td class="right">contraindicaciones</td>
				<td><input type="text" name="contraindicaciones" required value="<?php echo $Medicamentos->contraindicaciones ?>"></td>
			</tr>

			
				<td class="right">presentacion</td>
				<td><input type="text" name="presentacion" required value="<?php echo $Medicamentos->presentacion ?>"></td>
			</tr>

			
				<td class="right">laboratorio</td>
				<td><input type="text" name="laboratorio" required value="<?php echo $Medicamentos->laboratorio ?>"></td>
			</tr>
			
			<tr>
				<td class="right"><input class=" btn "type="submit" required value="Enviar"></td>
				<td><a class="btn btn-green" href="Medicamentos.php">Nuevo</a></td>
			</tr>

		</table>
	</form>

</fieldset>

	<table class="table-bordered unit-centered table-hovered">
			
				<?php 
					$Medicamentos = Medicamentos::listadoMedicamentos();
					if(mysqli_num_rows($Medicamentos) < 1){
						echo "<center><h4>Aún no se han agregado Medicamentos<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Nombre Comercial</th>
										<th>Nombre Genérico</th>
										<th>Descripción</th>
										<th>Contraindicaciones</th>
										<th>Presentación</th>
										<th>Laboratorio</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
					while ($fila = mysqli_fetch_assoc($Medicamentos)) {
						echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['nombre_comercial']}</td>
							<td>{$fila['nombre_generico']}</td>
							<td class="width-25">{$fila['descripcion']}</td>
							<td>{$fila['contraindicaciones']}</td>
							<td>{$fila['presentacion']}</td>
							<td>{$fila['laboratorio']}</td>
							
							<td><a href='Medicamentos.php?edit={$fila['id']}'>Editar</a> | 
								<a onclick="return confirm('¿Seguro que desea eliminar este Medicamento?');" href='Medicamentos.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>	
CODIGO;
						}
					}
				
				?>
		
		</table>


	<script>
$(function()
{
    $('#show-modal').on('loading.tools.modal', function(modal)
    {
        // your code
    });
});
</script>
<script>
$(function()
{
    $('#show-modal').on('opened.tools.modal', function(modal)
    {
        // your code
    });
});
</script>

<script>
$(function()
{
    $('#show-modal').on('closed.tools.modal', function()
    {
        // your code
    });
});
</script>

<script>
$(function()
{
    $('#show-modal').on('loading.tools.modal', function(modal)
    {
        this.createCancelButton('Cancel');

        var buttonDelete = this.createDeleteButton('Delete');
        var buttonAction = this.createActionButton('Save');

        buttonDelete.on('click', $.proxy(function()
        {
            // your code

            this.modal.close();

        }, this));

        buttonAction.on('click', $.proxy(function()
        {

            this.modal.close();

        }, this));
    });
});
</script>



<button class="btn" id="show-modal"
    data-tools="modal" data-width="700" data-title="Modal Header" data-content="mantenimientoCitas.php">
    Open Modal
</button>