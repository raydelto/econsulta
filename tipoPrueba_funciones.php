<?php
	class tipoPrueba{
	
	
	private $id = 0;
	private $tipo_prueba = "";
	
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
	
		$sql = "SELECT `id`,`tipo_prueba` FROM tipo_prueba WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->tipo_prueba = $fila['tipo_prueba'];
	
		}
	}


		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `tipo_prueba`
					  SET			
						`tipo_prueba` = '{$this->tipo_prueba}'
						
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `tipo_prueba`
									(
									`tipo_prueba`
									
									)
									VALUES
									(
									'{$this->tipo_prueba}'
									
									)";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	function eliminar($id){
		$sql = "DELETE FROM tipo_prueba where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	static function listadoTipoPrueba(){
		$sql = "SELECT `id`,`tipo_prueba` FROM tipo_prueba";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}


	
	
	
	
	}

?>