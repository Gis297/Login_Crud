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
			<h1>Registro de Gastos</h1>
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
		<br>
		<br>
		<div class="container">
			<div id="tablaDatatable">
				
			</div>
		</div>
		<!-- Modal -->
			<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Actualiza un Gasto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmnuevoU">
								<input type="text" hidden = "" id= "id" name="id">
								<label>Concepto</label>
								<input type="text" class="form-control input-sm" id="conceptoU" name="concepto">
								<label>Cantidad</label>
								<input type="text" class="form-control input-sm" id="cantidadU" name="cantidad">
								<label>Fecha</label>
								<input type="text" class="form-control input-sm" id="fechaU" name="fecha">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
						</div>
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
							'¡Se registro tú gasto!',
							'C:!',
							'success'
						);
					},
					error: function() {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Intenta llenar nuevamente tu gasto, por favor!',
							footer: '<a href>Why do I have this issue?</a>'
						});
					}
				});
			});

			$('#btnActualizar').click(function(){
					datos=$('#frmnuevoU').serialize();

					$.ajax({

						type:"POST",
						data: datos, 
						url:"procesos/actualizar.php",
						success:function(r){
							if(r==1){
								$('#tablaDatatable').load('tabla.php'); 
								Swal.fire(
								'¡Se actualizó de manera correcta!',
								'C:',
								'success'
						);
							}else{
								Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Intentalo de nuevo, por favor!',
								footer: '<a href>Why do I have this issue?</a>'
						}); 
							}

						}
					}); 
				});	
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaDatatable').load('tabla.php');
		});
	</script>

	<script type="text/javascript">

			function agregaFrmActualizar(id){

				$.ajax({

					type: "POST",
					data: "id=" + id,
					url: "procesos/obtener_datos.php",
					success:function(r){
						datos=jQuery.parseJSON(r); 
						$('#id').val(datos['id']); 
						$('#conceptoU').val(datos['concepto']);
						$('#cantidadU').val(datos['cantidad']);
						$('#fechaU').val(datos['fecha']);
					}
				});
			}

			function eliminarDatos(id){
				
				Swal.fire({
  			title: '¿Seguro que quieres eliminar este registro?',
 			 showDenyButton: true,
 			 showCancelButton: true,
  				confirmButtonText: `¡Si eliminalo!`,
  				//denyButtonText: ``,
				}).then((result) => {
 			 /* Read more about isConfirmed, isDenied below */
  			if (result.isConfirmed) {

  						$.ajax({

						type: "POST",
						data: "id=" + id,
						url: "procesos/eliminar.php",
						
					});
  					$('#tablaDatatable').load('tabla.php');
   			 Swal.fire('¡Se elimino este registro!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('No hubo cambios', '', 'info')
  }
})

			}
		</script>