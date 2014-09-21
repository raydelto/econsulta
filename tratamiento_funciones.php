<?php
	class tratamiento{
	
	
	private $id = 0;
	private $tratamiento = "";
	
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
	
		$sql = "SELECT `id`,`tratamiento` FROM tratamiento WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->tratamiento = $fila['tratamiento'];
	
		}
	}


		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `tratamiento`
					  SET			
						`tratamiento` = '{$this->tratamiento}'
						
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `tratamiento`
									(
									`tratamiento`
									
									)
									VALUES
									(
									'{$this->tratamiento}'
									
									)";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	
		function eliminar($id){
			$sql = "DELETE FROM tratamiento where id='$id'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		}

		//tratamientos reales
		static function listadoTratamientosAgregados(){
			$sql = "SELECT `id`,`tratamiento` FROM tratamiento";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}


		//listado de medicamentos
		static function listadoTratamiento(){
			$sql = "SELECT `id`,`nombre_comercial`,`nombre_generico`,`descripcion`,`contraindicaciones`,`presentacion`,
							`laboratorio` 
					FROM medicamento";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}
		
	

	
	}
	

?>