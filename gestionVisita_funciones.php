<?php
	class gestionVisita{
	
	
	private $id = 0;
	private $id_paciente = "";
	private $fecha = "";
	private $hora = "";
	private $nota_medica = "";
	private $diagnostico = "";
	private $tratamiento = "";
	private $medicamento = "";
	private $observaciones = "";
	
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
	
		$sql = "SELECT `id`,`id_paciente`,`fecha`,`hora`,`nota_medica`,`diagnostico`,`tratamiento`,`medicamento`,`observaciones`
		FROM consulta WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->id_paciente = $fila['id_paciente'];
			$this->fecha = $fila['fecha'];
			$this->hora = $fila['hora'];
			$this->nota_medica = $fila['nota_medica'];
			$this->diagnostico = $fila['diagnostico'];
			$this->tratamiento = $fila['tratamiento'];
			$this->medicamento = $fila['medicamento'];
			$this->observaciones = $fila['observaciones'];
	
		}
	}
	

		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `consulta`
					  SET			
						`id_paciente` = '{$this->id_paciente}',
						`fecha` = '{$this->fecha}',
						`hora` = '{$this->hora}',
						`nota_medica` = '{$this->nota_medica}',
						`diagnostico` = '{$this->diagnostico}',
						`tratamiento` = '{$this->tratamiento}',
						`medicamento` = '{$this->medicamento}',
						`observaciones` = '{$this->observaciones}'
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `consulta`
									(
									`id_paciente`,
									`fecha`,
									`hora`,
									`nota_medica`,
									`diagnostico`,
									`tratamiento`,
									`medicamento`,
									`observaciones`
									)
									VALUES
									(
									'{$this->id_paciente}',
									'{$this->fecha}',
									'{$this->hora}',
									'{$this->nota_medica}',
									'{$this->diagnostico}',
									'{$this->tratamiento}',
									'{$this->medicamento}',
									'{$this->observaciones}'
									)";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}

		function eliminar($id){
			$sql = "DELETE FROM consulta where id='$id'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		}

		static function listadoGestionVisita(){
			$sql = "SELECT `id`,`id_paciente`,`fecha`,`hora`,`nota_medica`,`diagnostico`,`tratamiento`,`medicamento`,`observaciones`
					FROM consulta";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}
		
	
	}

?>