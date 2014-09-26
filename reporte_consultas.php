<?php
	include 'plantilla.php';

?>

	<table class="table-container table-hovered">
			
				<?php 
					 $reporte_consultas_funciones = reporte_consultas_funciones::repoteConsulta();
					 $resultado = array();
					if(mysqli_num_rows($reporte_consultas_funciones) < 1){
						echo "<center><h4>Aún no se han agregado consultas<h4></center>";
					}else{
						echo "<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Fecha & Hora</th>
										<th>Motivo Consulta</th>
										<th>Observacion</th>
										<th>AFP</th>
										<th>Sintoma</th>
										<th>Diagnostico</th>
										<th>Medicamentos</th>
										<th>Tratamiento</th>
										<th>Tipo _prueba</th>
									 </tr>
							 </thead>";


					?>
				<?php
					while ($fila = mysqli_fetch_assoc($reporte_consultas_funciones)) {
						$sintomas = reporte_consultas_funciones::sintomas($fila['id']);
						$diagnosticos = reporte_consultas_funciones::diagnosticos($fila['id']);
						$medicamentos = reporte_consultas_funciones::medicamentos($fila['id']);
						$tratamientos = reporte_consultas_funciones::tratamientos($fila['id']);
						$tipo_pruebas = reporte_consultas_funciones::tipo_pruebas($fila['id']);
						

						echo "

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['apellidos']}</td>
							<td>{$fila['Fecha y Hora']}</td>
							<td>{$fila['motivo_consulta']}</td>
							<td>{$fila['observacion']}</td>
							<td>";

							
							if($fila['fuma'] == 1){
								echo "Fuma, ";
							}else{
								echo "No fuma, ";
							}

							if($fila['cafe'] == 1){
								echo "Toma alcohol, ";
							}else{
								echo "No toma alcohol, ";
							}

							if($fila['cafe'] == 1){
								echo "Toma café ";
							}else{
								echo "No toma café";
							}

							echo"
							</td>
							<td>";

							foreach ($sintomas as $sintoma) {
								echo $sintoma['sintoma'].", ";
								
							}

						echo"
							</td>
							<td>";
						foreach ($diagnosticos as $diagnostico) {
								echo $diagnostico['diagnostico'].", ";
								
							}							
						echo "
							</td>
							<td>";

							foreach ($medicamentos as $medicamento) {
								echo $medicamento['medicamentos'].", ";
								
							}


						echo "
						</td>
						<td>";
							foreach ($tratamientos as $tratamiento) {
								echo $tratamiento['tratamiento'].", ";
								
							}

						echo "
						</td>
						<td>";
						foreach ($tipo_pruebas as $tipo_prueba) {
									echo $tipo_prueba['tipo_prueba'].", ";
								
							}

						echo "
						</td>
						</tr>";



						

						}
					}

				?>

		</table>

<br/><br/><br/><br/>

