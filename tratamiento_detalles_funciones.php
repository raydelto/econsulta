<?php
	class tratamiento_detalles_funciones{
	
	
	private $id = 0;
	private $id_tratamiento = "";
	private $id_consulta = "";
	
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
	
	
	function guardar(){
		
		$sql = "INSERT INTO `tratamientos_detalles`
							(
							`id_tratamiento`,
							`id_consulta`
							)
							VALUES
							(
							'{$this->id_tratamiento}',
							'{$this->id_consulta}'
							)";
		echo $sql;
		mysqli_query(conexion::obtenerInstancia(), $sql);
		$this->id = mysqli_insert_id(conexion::obtenerInstancia());
	
	}


	}
	

?>