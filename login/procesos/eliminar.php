<?php 
		
		require_once '../clases/crud.php';

		$crud = new crud(); 
		echo $crud-> eliminar($_POST['id']);


 ?>