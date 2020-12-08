<?php 

	session_start();
	require_once "../clases/crud.php";

	$crud = new crud();

	$usuario = $_POST['usuario'];
	$concepto = $_POST['concepto'];
	$cantidad = $_POST['cantidad'];
	$fecha = $_POST['fecha'];

	echo $crud->guardar($usuario, $concepto, $cantidad, $fecha);

    
?>