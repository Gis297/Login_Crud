<?php 

	require_once "Conexion.php";

	class Usuarios extends Conexion {
		public function agregarUsuario($nombre, $apaterno, $amaterno, $email, $usuario, $password){
			$conexion = Conexion::conectar();

			$password = sha1($password);

			$sql = "INSERT INTO usuario (nombre, apaterno, amaterno, email, usuario, password)
					VALUES ( '$nombre', '$apaterno', '$amaterno','$email','$usuario','$password')";
			$result = mysqli_query($conexion, $sql);

			return $result;
		}

		public function login($usuario, $password){

			$conexion = Conexion::conectar();
			$password = sha1($password);

			$sql = "SELECT count(*) as total FROM usuario
					WHERE usuario = '$usuario' AND password = '$password' ";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos['total'] > 0) {
				//encontro el usuario
				$_SESSION['usuario'] = $usuario;
				return true;
			}else{
				//no encontro el usuario
				return false;
			}
		}
	}

 ?>