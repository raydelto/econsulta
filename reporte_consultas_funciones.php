<?php
	class reporte_consultas_funciones{

		static function repoteConsulta(){
			$sql = "SELECT co.id_consulta as id,pa.nombre, CONCAT(pa.apellido_paterno, \" \", pa.apellido_materno) as `apellidos`, CONCAT(co.fecha,\" - \",co.hora) as `Fecha y Hora`, 
							co.motivo_consulta, co.observacion, fuma, alcohol, cafe
					FROM consulta co
					JOIN paciente pa
					ON co.id_paciente = pa.id
					ORDER BY pa.nombre";

			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			return $rs;

		}

		static function sintomas($id_consulta){
			$sql = "SELECT sin.sintoma
					FROM consulta co
					INNER JOIN sintoma_detalle sind
					ON co.id_consulta = sind.id_consulta
					INNER JOIN sintoma sin
					ON sin.id = sind.id_sintoma
					WHERE co.id_consulta = {$id_consulta}";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			return $rs;

		}

		static function diagnosticos($id_consulta){
			$sql = "SELECT dia.diagnostico
					FROM consulta co
					INNER JOIN diagnostico_detalle diad
					ON co.id_consulta = diad.id_consulta
					INNER JOIN diagnostico dia
					ON dia.id = diad.id_diagnostico
					WHERE co.id_consulta = {$id_consulta}";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			return $rs;

		}

		static function medicamentos($id_consulta){
			$sql = "SELECT CONCAT(med.nombre_comercial, ' - ',med.nombre_generico) as medicamentos
					FROM consulta co
					INNER JOIN recetas re
					ON co.id_consulta = re.id_consulta
					INNER JOIN medicamento med
					ON med.id = re.id_medicamento
					WHERE co.id_consulta = {$id_consulta}";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			return $rs;

		}


		static function tratamientos($id_consulta){
			$sql = "SELECT trat.tratamiento
					FROM consulta co
					INNER JOIN tratamientos_detalles tratd
					ON co.id_consulta = tratd.id_consulta
					INNER JOIN tratamiento trat
					ON trat.id = tratd.id_tratamiento
					WHERE co.id_consulta = {$id_consulta}";
			
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			return $rs;

		}

		static function tipo_pruebas($id_consulta){
			$sql = "SELECT tp.tipo_prueba
					FROM consulta co
					INNER JOIN tipos_pruebas_detalles tpd
					ON co.id_consulta = tpd.id_consulta
					INNER JOIN tipo_prueba tp
					ON tp.id = tpd.id_tipo_prueba
					where co.id_consulta = {$id_consulta}";
			
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			return $rs;

		}
			


	}


?>