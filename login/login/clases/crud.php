<?php

	require_once "Conexion.php";

	class crud extends Conexion {

		private function obtener_id($usuario){
		
			$conexion = Conexion::conectar();
			$sql = "SELECT id_usuario from usuario where usuario ='$usuario'"; 

			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			return $datos['id_usuario'];
		}

	    public function guardar($usuario,$concepto,$cantidad, $fecha){
	    	$id= $this-> obtener_id($usuario); 
	    	$conexion = Conexion::conectar();

	    	$sql = "INSERT INTO gasto (id_usuario, concepto, cantidad, fecha) values ('$id','$concepto','$cantidad', '$fecha')";

	    	$result = mysqli_query($conexion, $sql);

	    	 return $result; 

		}
	
	}

 ?>