<?php 

	require_once '../clases/crud.php'; 

	$crud = new crud (); 
	$datos= array(
		$_POST['concepto'], $_POST['cantidad'], $_POST['fecha'], $_POST['id']);
		echo $crud->actualizar($datos); 



 ?>