
<?php
	class sintoma_detalle{

		private $id = 0;
		private $id_sintoma = 0;
		private $id_consulta = 0;
		
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
			
					$sql = "INSERT INTO `sintoma_detalle`
										(
										`id_sintoma`,
										`id_consulta`
										)
										VALUES
										(
										'{$this->id_sintoma}',
										'{$this->id_consulta}'
										)";
		
					mysqli_query(conexion::obtenerInstancia(), $sql);
					$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				}
		}
?>