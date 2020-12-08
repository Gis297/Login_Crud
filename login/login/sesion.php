<?php 

	function autenticar(){

		if(!revisar_usuario()){
			header('location: login.php'); 
			exit(); 
		}
	}


	function revisar_usuario(){
		return isset($_SESSION['usuario']);
	}

	session_start();
	autenticar(); 
 ?>