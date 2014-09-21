<?php
	class receta_detalles_funciones{

		private $id = 0;
		private $id_medicamento = 0;
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
		
		function __construct($id = 0){
			$this->id = $this->id;
			
		}
		

			function guardar(){
				
					$sql = "INSERT INTO `recetas`
										(
										`id_medicamento`,
										`id_consulta`
										)
										VALUES
										(
										'{$this->id_medicamento}',
										'{$this->id_consulta}'
										)";
					
					mysqli_query(conexion::obtenerInstancia(), $sql);
					$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}
		
		}
?>