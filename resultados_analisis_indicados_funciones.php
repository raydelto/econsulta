<?php
	class resultados_analisis_indicados{
	
	
	private $id = 0;
	private $id_prueba = "";
	private $id_paciente = "";
	private $resultados = "";
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
	
	function cargar(){
	
		$sql = "SELECT `id`,`id_prueba`,`id_paciente`,`resultados`,`fecha`,`hora` 
				FROM resultados_pruebas_indicadas 
				WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->id_prueba = $fila['id_prueba'];
			$this->id_paciente = $fila['id_paciente'];
			$this->resultados = $fila['resultados'];
			$this->fecha = $fila['fecha'];
			$this->hora = $fila['hora'];
	
		}
	}
	

		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `resultados_pruebas_indicadas`
					  SET			
						`id_prueba` = '{$this->id_prueba}',
						`id_paciente` = '{$this->id_paciente}'
						`resultados` = '{$this->resultados}',
						`fecha` = '{$this->fecha}',
						`hora` = '{$this->hora}'
						
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `resultados_pruebas_indicadas`
									(
									`id_prueba`,
									`id_paciente`,
									`resultados`,
									`fecha`,
									`hora`
									)
									VALUES
									(
									'{$this->id_prueba}',
									'{$this->id_paciente}',
									'{$this->resultados}',
									'{$this->fecha}',
									'{$this->hora}'#0D1537
									)";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	
	function eliminar($id){
		$sql = "DELETE FROM resultados_pruebas_indicadas where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	static function listadoAnalisisIndicados(){
		$sql = "SELECT `id`,`id_prueba`,`id_paciente`,`resultados`,`fecha`,`hora`  
				FROM resultados_pruebas_indicadas";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	
	

	}
?>