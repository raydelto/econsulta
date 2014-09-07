<?php
	class Cita{
	
	
	private $id = 0;
	private $id_paciente = "";
	private $fecha = "";
	private $hora = "";
	private $doctor = "";


	
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
						`hora` = '{$this->hora}',
						`doctor` = '{$this->doctor}'
						 WHERE `id` =  '{$this->id}'";
	
				$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
					if ($rs == false) {
						//Validar que no hay cita con ese doctor a esa hora con alguien más
					}else{
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
						header("Location:mantenimientoCitas.php");
					}
				
			}else{
				$sql = "INSERT INTO `cita`
									(
									`id_paciente`,
									`fecha`,
									`hora`,
									`doctor`
									)
									VALUES
									(
									'{$this->id_paciente}',
									'{$this->fecha}',
									'{$this->hora}',
									'{$this->doctor}'
									)";
					echo $sql;
					$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
					if ($rs == false) {
						//Validar que no hay cita con ese doctor a esa hora con alguien más
					}else{
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
						header("Location:mantenimientoCitas.php");
					}
			}
		}
	
		function cargar(){
		
			$sql = "SELECT `id`,`id_paciente`,`fecha`,`hora`,`doctor` FROM cita WHERE id = '{$this->id}'";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if(mysqli_num_rows($rs) > 0){
				$fila = mysqli_fetch_assoc($rs);
				$this->id = $fila['id'];
				$this->id_paciente = $fila['id_paciente'];
				$this->fecha = $fila['fecha'];
				$this->hora = $fila['hora'];
				$this->doctor = $fila['doctor'];
		
			}
		}

		function eliminar($id){
			$sql = "DELETE FROM cita where id='$id'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		}

		static function listadoCita(){
			$sql = "SELECT `id`,`id_paciente`,`fecha`,`hora`,`doctor` FROM cita";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}
		
		
	
	
	}
?>