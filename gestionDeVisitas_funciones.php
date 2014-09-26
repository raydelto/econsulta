<?php

	

	class gestionDeVisitas{
	
	
	private $id_consulta = 0;
	private $id_paciente = 0;
	private $fecha = "";
	private $hora = "";
	private $motivo_consulta = "";
	private $fuma = 0;
	private $alcohol = 0;
	private $cafe = 0;
	private $observacion = "";
	private $ultimo = "";


	
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
	
	function __construct($id_consulta = 0){
		$this->id_consulta = $this->id_consulta;
		$this->cargar();
	}
	

	function cargar(){
	
		$sql = "SELECT `id_consulta`,`id_paciente`,`fecha`,`hora`,`motivo_consulta`,`fuma`,`alcohol`,`cafe`,`observacion`
		FROM consulta WHERE id_consulta = '{$this->id_consulta}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id_consulta = $fila['id_consulta'];
			$this->id_paciente = $fila['id_paciente'];
			$this->fecha = $fila['fecha'];
			$this->hora = $fila['hora'];
			$this->motivo_consulta = $fila['motivo_consulta'];
			$this->fuma = $fila['fuma'];
			$this->alcohol = $fila['alcohol'];
			$this->cafe = $fila['cafe'];
			$this->observacion = $fila['observacion'];
	
		}
	}
	

		function guardar(){
			if($this->id_consulta > 0){
				$sql="UPDATE `consulta`
					  SET			
						`id_paciente` = '{$this->id_paciente}',
						`fecha` = '{$this->fecha}',
						`hora` = '{$this->hora}',
						`motivo_consulta` = '{$this->motivo_consulta}',
						`fuma` = '{$this->fuma}',
						`alcohol` = '{$this->alcohol}',
						`cafe` = '{$this->cafe}',
						`observacion` = '{$this->observacion}'
						 WHERE `id_consulta` =  '{$this->id_consulta}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id_consulta = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `consulta`
									(
									`id_paciente`,
									`fecha`,
									`hora`,
									`motivo_consulta`,
									`fuma`,
									`alcohol`,
									`cafe`,
									`observacion`
									)
									VALUES
									(
									'{$this->id_paciente}',
									'{$this->fecha}',
									'{$this->hora}',
									'{$this->motivo_consulta}',
									'{$this->fuma}',
									'{$this->alcohol}',
									'{$this->cafe}',
									'{$this->observacion}'
									)";
				
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id_consulta = mysqli_insert_id(conexion::obtenerInstancia());
				

			

			}
		}

		function eliminar($id_consulta){
			$sql = "DELETE FROM consulta where id_consulta='$id_consulta'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		}

		static function listadoGestionDeVisitas(){
			$sql = "SELECT `id_consulta`,`id_paciente`,`fecha`,`hora`,`motivo_consulta`,`fuma`,`alcohol`,`cafe`,`observacion`
					FROM consulta";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}
		
		static function ultimoId($sql){
			$rsu = mysqli_query(conexion::obtenerInstancia(), $sql);
			$fila = mysqli_fetch_assoc($rsu);
			$ultimo = $fila['ultimo_id'];
			return  $ultimo;
				
		}
	
	}

?>