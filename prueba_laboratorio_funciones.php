<?php
	class prueba_laboratorio{
	
	
	private $id = 0;
	private $prueba = "";
	private $id_tipo_prueba = "";
	
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
	
		$sql = "SELECT `id`,`prueba`,`id_tipo_prueba` FROM prueba_laboratorio WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->prueba = $fila['prueba'];
			$this->id_tipo_prueba = $fila['id_tipo_prueba'];
	
		}
	}
	

		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `prueba_laboratorio`
					  SET			
						`prueba` = '{$this->prueba}'
						
						 WHERE `id` =  '{$this->id}'";
				echo $sql;
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `prueba_laboratorio`
									(
									`prueba`,
									`id_tipo_prueba`
									)
									VALUES
									(
									'{$this->prueba}',
									'{$this->id_tipo_prueba}'
									)";
				echo $sql;
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	
	function eliminar($id){
		$sql = "DELETE FROM prueba_laboratorio where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	static function listadoPruebaLaboratorio(){
		$sql = "SELECT `id`,`prueba`,`id_tipo_prueba` FROM prueba_laboratorio";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	


	static function listadoTipoPrueba(){
		$sql = "SELECT p.id as id, t.id as id_tipo_prueba,t.tipo_prueba, p.prueba 
				FROM tipo_prueba t
				JOIN prueba_laboratorio p
				ON t.id = p.id_tipo_prueba";
		echo $sql;
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}

	static function listadoTipoPrueba2(){
		$sql = "SELECT `id`,`tipo_prueba` FROM tipo_prueba";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}


	}

?>