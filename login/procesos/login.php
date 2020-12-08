<?php 
	//esta funcion debe ser agregada si se va a utilizar alguna variable de sesion

	session_start();
	require_once "../clases/Usuarios.php";

	$Usuarios = new Usuarios();

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	echo $Usuarios->login($usuario, $password);
 ?>

