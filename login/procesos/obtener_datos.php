<?php 
	
	require_once '../clases/crud.php';

	$crud = new crud ();
	echo json_encode($crud-> obtener_datos($_POST['id']));



 ?>