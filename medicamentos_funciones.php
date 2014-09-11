<?php

	class Medicamentos{
	
	
	private $id = 0;
	private $nombre_comercial = "";
	private $nombre_generico = "";
	private $descripcion = "";
	private $contraindicaciones = "";
	private $presentacion = "";
	private $laboratorio = "";

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
	
		$sql = "SELECT * FROM medicamento WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->nombre_comercial = $fila['nombre_comercial'];
			$this->nombre_generico = $fila['nombre_generico'];
			$this->descripcion = $fila['descripcion'];
			$this->contraindicaciones = $fila['contraindicaciones'];
			$this->presentacion = $fila['presentacion'];
			$this->laboratorio = $fila['laboratorio'];
	
		}
	}
	


		function guardar(){
			if($this->id > 0){
				$sql="UPDATE `medicamento`
					  SET			
						`nombre_comercial` = '{$this->nombre_comercial}',
						`nombre_generico` = '{$this->nombre_generico}',
						`descripcion` = '{$this->descripcion}',
						`contraindicaciones` = '{$this->contraindicaciones}',
						`presentacion` = '{$this->presentacion}',
						`laboratorio` = '{$this->laboratorio}'
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `medicamento`
									(
									`nombre_comercial`,
									`nombre_generico`,
									`descripcion`,
									`contraindicaciones`,
									`presentacion`,
									`laboratorio`
									)
									VALUES
									(
									'{$this->nombre_comercial}',
									'{$this->nombre_generico}',
									'{$this->descripcion}',
									'{$this->contraindicaciones}',
									'{$this->presentacion}',
									'{$this->laboratorio}'
									)";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	
	static function listadoMedicamentos(){
		$sql = "SELECT * FROM medicamento";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	
	function eliminar($id){
		$sql = "DELETE FROM medicamento where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}
	

	
	
	}

?>