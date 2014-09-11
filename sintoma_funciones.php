<?php

class sintoma{
	
	
	private $id = 0;
	private $sintoma = "";
	private $descripcion = "";
	
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
	
		$sql = "SELECT `id`,`sintoma`,`descripcion` FROM sintoma WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->sintoma = $fila['sintoma'];
			$this->sintoma = $fila['descripcion'];
	
		}
	}
	

	function guardar(){
		if($this->id > 0){
			$sql="UPDATE `sintoma`
				  SET			
					`sintoma` = '{$this->sintoma}',
					`descripcion` = '{$this->descripcion}'
					
					 WHERE `id` =  '{$this->id}'";

			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			
		}else{
			$sql = "INSERT INTO `sintoma`
								(
								`sintoma`,
								`descripcion`
								
								)
								VALUES
								(
								'{$this->sintoma}',
								'{$this->descripcion}'
								
								)";
			echo $sql;
			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());
		}
	}


	function eliminar($id){
		$sql = "DELETE FROM sintoma where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	static function listadoSintoma(){
		$sql = "SELECT `id`,`sintoma`,`descripcion` FROM sintoma";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}


	

}
	

?>