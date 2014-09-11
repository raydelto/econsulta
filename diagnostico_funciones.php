<?php
	class diagnostico{
	
	
	private $id = 0;
	private $diagnostico = "";
	
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
	
		$sql = "SELECT `id`,`diagnostico` FROM diagnostico WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->diagnostico = $fila['diagnostico'];
	
		}
	}
	

	function guardar(){
		if($this->id > 0){
			$sql="UPDATE `diagnostico`
				  SET			
					`diagnostico` = '{$this->diagnostico}'
					
					 WHERE `id` =  '{$this->id}'";

			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			
		}else{
			$sql = "INSERT INTO `diagnostico`
								(
								`diagnostico`
								
								)
								VALUES
								(
								'{$this->diagnostico}'
								
								)";

			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());
		}
	}


	function eliminar($id){
		$sql = "DELETE FROM diagnostico where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	static function listadoDiagnostico(){
		$sql = "SELECT `id`,`diagnostico` FROM diagnostico";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	


	}
?>