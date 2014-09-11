<?php
	class Paciente{

		private $id = 0;
		private $cedula = "";
		private $nombre = "";
		private $apellido_paterno = "";
		private $apellido_materno = "";
		private $estado_civil = "";
		private $fecha_nacimiento = 0;
		private $telefono = "";
		private $sexo = "";
		private $direccion = "";
		private $observacion = "";

		function __get($atributo){
			if(isset($this->$atributo)){
				return $this->$atributo;
			}else{
				return "El atributo que intentas llamar no existe";
		
			}
		}
		
		function __set($atributo, $valor){
			if(isset($this->$atributo)){
				$this->$atributo = $valor;
			}else{
				echo "El atributo $atributo no existe <br/>";
			}
		}
		
		function __construct($id = 0){
			$this->id = $this->id;
			$this->cargar();
		}
		
		function cargar(){
		
			$sql = "SELECT `id`,`cedula`,`nombre`, `apellido_paterno`,`apellido_materno`,`estado_civil`,`fecha_nacimiento`,`telefono`,`sexo`,`direccion`,`observacion` 
					FROM paciente 
					WHERE id = '{$this->id}'";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if(mysqli_num_rows($rs) > 0){
				$fila = mysqli_fetch_assoc($rs);
				$this->id = $fila['id'];
				$this->cedula = $fila['cedula'];
				$this->nombre = $fila['nombre'];
				$this->apellido_paterno = $fila['apellido_paterno'];
				$this->apellido_materno = $fila['apellido_materno'];
				$this->estado_civil = $fila['estado_civil'];
				$this->fecha_nacimiento = $fila['fecha_nacimiento'];
				$this->telefono = $fila['telefono'];
				$this->sexo = $fila['sexo'];
				$this->direccion = $fila['direccion'];
		
			}
		}

		function eliminar($id){
			$sql = "DELETE FROM paciente where id='$id'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		}


			function guardar(){
				if($this->id > 0){
					$sql="UPDATE `paciente`
						  SET			
							`cedula` = '{$this->cedula}',
							`nombre` = '{$this->nombre}',
							`apellido_paterno` = '{$this->apellido_paterno}',
							`apellido_materno` = '{$this->apellido_materno}',
							`estado_civil` = '{$this->estado_civil}',
							`fecha_nacimiento` = '{$this->fecha_nacimiento}',
							`telefono` = '{$this->telefono}',
							`sexo` = '{$this->sexo}',
							`direccion` = '{$this->direccion}',
							`observacion` = '{$this->observacion}'
							 WHERE `id` =  '{$this->id}'";
		
					$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
					if ($rs == false) {
						echo "<h3 style='color: red' align='center'>Error, ésta Cédula está actualmente en uso.</h3>";
					}else{
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
						header("Location:mantenimientoPacientes.php");
					}
				}else{
					$sql = "INSERT INTO `paciente`
										(
										`cedula`,
										`nombre`,
										`apellido_paterno`,
										`apellido_materno`,
										`estado_civil`,
										`fecha_nacimiento`,
										`telefono`,
										`sexo`,
										`direccion`,
										`observacion`
										)
										VALUES
										(
										'{$this->cedula}',
										'{$this->nombre}',
										'{$this->apellido_paterno}',
										'{$this->apellido_materno}',
										'{$this->estado_civil}',
										'{$this->fecha_nacimiento}',
										'{$this->telefono}',
										'{$this->sexo}',
										'{$this->direccion}',
										'{$this->observacion}'
										)";
					echo $sql;
					$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
				
					if ($rs == false) {
						echo "<h3 style='color: red' align='center'>Error, ésta Cédula está actualmente en uso.</h3>";
					}else{
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
						header("Location:mantenimientoPacientes.php");
					}
					
				}
			}

			static function listadoPaciente(){
				$sql = "SELECT `id`, `cedula`,`nombre`, `apellido_paterno`,`apellido_materno`,`estado_civil`,`fecha_nacimiento`,`telefono`,`sexo`,`direccion`,`observacion` 
						FROM paciente";
				$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
				return $rs;
			}
			

	}
?>