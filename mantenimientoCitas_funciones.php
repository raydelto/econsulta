
<?php
	class Cita{
	
	
	private $id = 0;
	private $id_paciente = "";
	private $fecha = "";
	private $hora = "";


	
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
	

		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `cita`
					  SET			
						`id_paciente` = '{$this->id_paciente}',
						`fecha` = '{$this->fecha}',
						`hora` = '{$this->hora}'
						 WHERE `id` =  '{$this->id}'";
	
				$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
					if ($rs == false) {
						//Validar que no hay cita con ese doctor a esa hora con alguien más
					}else{
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
						header("Location:Citas.php");
					}
				
			}else{
				$sql = "INSERT INTO `cita`
									(
									`id_paciente`,
									`fecha`,
									`hora`
									)
									VALUES
									(
									'{$this->id_paciente}',
									'{$this->fecha}',
									'{$this->hora}'
									)";
					echo $sql;
					$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
					if ($rs == false) {
						//Validar que no hay cita con ese doctor a esa hora con alguien más
					}else{
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
						header("Location:Citas.php");
					}
			}
		}
	
		function cargar(){
		
			$sql = "SELECT `id`,`id_paciente`,`fecha`,`hora` FROM cita WHERE id = '{$this->id}'";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if(mysqli_num_rows($rs) > 0){
				$fila = mysqli_fetch_assoc($rs);
				$this->id = $fila['id'];
				$this->id_paciente = $fila['id_paciente'];
				$this->fecha = $fila['fecha'];
				$this->hora = $fila['hora'];
		
			}
		}

		function eliminar($id){
			$sql = "DELETE FROM cita where id='$id'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		} 

		static function listadoCita(){
			$fecha = date("Y-m-d");
			
			$sql = "SELECT c.id, c.id_paciente,p.nombre,c.fecha,c.hora  
					FROM paciente p 
					JOIN cita c
					ON c.id_paciente = p.id
					WHERE fecha >= '{$fecha}'
					ORDER BY fecha";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}

		static function cantidadCitasHoy(){
			$fecha = date("Y-m-d");
			//echo $fecha;
			$sql = "SELECT COUNT(c.id) as cantidad
					FROM paciente p 
					JOIN cita c
					ON c.id_paciente = p.id
					WHERE fecha >= '{$fecha}'";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);

			return $rs;
		}

		static function buscarPaciente($valor, $tipoBusqueda){

				if($tipoBusqueda == "cedula"){
					$sql = "SELECT `id`, `cedula`,`nombre`, CONCAT(`apellido_paterno`,' ',`apellido_materno`) as apellidos,`estado_civil`,`fecha_nacimiento`,`telefono`,`sexo`,`direccion`,`observacion`
						FROM paciente
						WHERE cedula LIKE '%{$valor}%'";
					$rs = mysqli_query(conexion::obtenerInstancia(),$sql);

					return $rs;
				}else if($tipoBusqueda == "nombre"){

					$sql = "SELECT `id`, `cedula`,`nombre`, CONCAT(`apellido_paterno`,' ',`apellido_materno`) as apellidos,`estado_civil`,`fecha_nacimiento`,`telefono`,`sexo`,`direccion`,`observacion`
						FROM paciente
						WHERE nombre LIKE  '%{$valor}%'";
					$rs = mysqli_query(conexion::obtenerInstancia(),$sql);

					return $rs;

				}else if($tipoBusqueda == "apellido"){

					$sql = "SELECT `id`, `cedula`,`nombre`, CONCAT(`apellido_paterno`,' ',`apellido_materno`) as apellidos,`estado_civil`,`fecha_nacimiento`,`telefono`,`sexo`,`direccion`,`observacion`
						FROM paciente
						WHERE apellido_paterno LIKE '%{$valor}%' OR apellido_materno LIKE '%{$valor}%'";
					$rs = mysqli_query(conexion::obtenerInstancia(),$sql);

					return $rs;

				}
				
			}

			static function buscarNombre($id){
				$sql = "SELECT `nombre`, CONCAT(`apellido_paterno`,' ',`apellido_materno`) as apellidos 
						FROM paciente
						WHERE `id` = {$id}";

				$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
				return $rs;
			}
	
	}
?>