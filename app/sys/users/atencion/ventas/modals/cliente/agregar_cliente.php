<!--modalCambiarCantidad-->
<div class='modal fade' id='modalAgregarCliente' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
            <div class='modal-header'>
				<h5 class='modal-title' id='tipoVenta'> 
					<h5>Agregar cliente</h5>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
					<!--Env�o de ID venta a PHP via JS-->
					<span id='idVenta'></span>
					<!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS-->
					<label id='id_prod' style='display:  none'></label>
				</h5>
			</div>
            <div class='modal-body' align='center'>
				<div class="row">
					<div class="col-lg-3">
						<label for=''>R.U.T.</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='txtRutGuardar' id='txtRutGuardar' class='form form-control' required>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label for=''>Nombre:</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='txtNombreGuardar' id='txtNombreGuardar' class='form form-control' required>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label for=''>Apellido:</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='txtApellidoGuardar' id='txtApellidoGuardar' class='form form-control' required>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label for=''>Teléfono:</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='txtTelefonoGuardar' id='txtTelefonoGuardar' class='form form-control' required>
					</div>
				</div>
                
			</div>
			<div class='modal-footer'>
				<label for='' id='lblRutValido'></label>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
				<button type='submit' class='btn btn-success' id='btnGuardarCliente' data-dismiss='modal'>Guardar</button>
			</div> 
		</div>
	</div>
</div>
		
