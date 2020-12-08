	<!--concepto de gastos, cantidad de gastos,fecha-->
	<!DOCTYPE html>
	<html>

	<head>
		<title>Pagina</title>
		<?php
		require_once 'sesion.php';
		require_once 'dependencias.php';
		?>
	</head>

	<body>
		<div class="container">
			<h1>Regitro de Gastos</h1>
			<div class="row">
				<div class="col-sm-2">
					<form id="formgasto">
						<label>Concepto de Gasto</label>
						<input type="text" name="concepto" id="concepto" required="" placeholder="Nombre del gasto">
						<label>Cantidad de Gasto</label>
						<input type="number" name="cantidad" id="cantidad" required="" min="0" step="0.01" placeholder="100.00">
						<label>Fecha</label>
						<input type="date" name="fecha" id="fecha" required="">
						<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
						<br>
						<br>
						<button class="btn btn-primary" id="guardar">Guardar</button>
					</form>

				</div>
			</div>
		</div>
	</body>

	</html>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#guardar').click(function(e) {
				e.preventDefault();
				datos = $('#formgasto').serialize();

				$.ajax({
					type: "POST",
					data: datos,
					url: "procesos/gasto.php",
					success: function(r) {
						$('#formgasto')[0].reset();
						Swal.fire(
							'Good job!',
							'You clicked the button!',
							'success'
						);
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