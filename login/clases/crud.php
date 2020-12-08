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

		public function obtener_datos($id){
			$conexion = Conexion::conectar();
			$sql = "SELECT concepto, cantidad, fecha from gasto where id='$id'";
			$result = mysqli_query($conexion, $sql);
			$ver = mysqli_fetch_row($result);

			$datos= array(
				'id'=> $id,
				'concepto'=> $ver[0],
				'cantidad'=> $ver[1],
				'fecha' => $ver[2],
			);

			return $datos; 
		}

		public function actualizar($datos){
			$conexion = Conexion::conectar();
			$sql= "UPDATE gasto set concepto = '$datos[0]',
			cantidad = '$datos[1]',
			fecha = '$datos[2]' where id= '$datos[3]'";

			return mysqli_query($conexion, $sql);
		}
	
		public function eliminar($id){
			$conexion = Conexion::conectar();
			$sql = "DELETE from gasto where id='$id'"; 

			return mysqli_query($conexion, $sql);
		}
	}

 ?>