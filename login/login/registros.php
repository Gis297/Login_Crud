<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
	<?php require_once "dependencias.php"; ?>
</head>
<body>
	<div class="container">
		<h1>Registro de Usuarios</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="formreg">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" required="" placeholder="Tu nombre">
					<label for="apaterno">Apellido Paterno</label>
					<input type="text" name="apaterno" class="form-control" required="" placeholder="Tu apellido paterno">
					<label for="amaterno">Apellido Materno</label>
					<input type="text" name="amaterno" class="form-control" required="" placeholder="Tu apellido materno">
					<label for="email">E-mail</label>
					<input type="text" name="email" class="form-control" required="" placeholder="mail@mail.com">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" class="form-control" required="" placeholder="Escribe un usuario">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" required="">
					<br>
					<button class="btn btn-danger" id="reg">Registrar</button>
					<a href="login.php" class="btn btn-primary">Login</a>
				</form>
				
			</div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
		$(document).ready(function() {
			$('#reg').click(function(e) {
				e.preventDefault();
				datos = $('#formreg').serialize();

				$.ajax({
					type: "POST",
					data: datos,
					url: "procesos/registros.php",
					success: function(r) {
						Swal.fire({
								icon: 'success',
								title: 'Your work has been saved',
								showConfirmButton: true,
							})
							.then((result) => {
								if (result.isConfirmed) {
									window.location.href = 'login.php';
								}
							})
					},
					error: function() {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Something went wrong!',
							footer: '<a href>Why do I have this issue?</a>'
						});
					}
				});
			});

		});
	</script>