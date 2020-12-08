
<?php 

require_once "../clases/Usuarios.php";
$Usuarios = new Usuarios();

$nombre = $_POST['nombre'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

echo $Usuarios->agregarUsuario($nombre, $apaterno,$amaterno, $email, $usuario, $password);

?>