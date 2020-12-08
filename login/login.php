<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<?php require_once "dependencias.php"; ?>
</head>

<body>
	<div class="container">
		<h1>Login de Usuarios</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="formlogin">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					<br>
					<button class="btn btn-primary" id="log">Entrar</button>
					<a href="registros.php" class="btn btn-success">Registrar</a>

				</form>
			</div>
		</div>
	</div>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#log').click(function(e) {
			e.preventDefault();
			datos = $('#formlogin').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/login.php",
				success: function(r) {

					if (r == 1) {
						Swal.fire({
								icon: 'success',
								title: '¡Ingresaste correctamente!',
								showConfirmButton: true,
							})
							.then((result) => {
								if (result.isConfirmed) {
									window.location.href = 'index.php';
								}
							})
					} else {
						Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: '¡Tu contraseña no es correcta!',
								//footer: '<a href>Why do I have this issue?</a>'
							})
							.then((result) => {
								if (result.isConfirmed) {
									window.location.href = 'registros.php';
								}
							})
					}

				}
			});
		});

	});
</script>