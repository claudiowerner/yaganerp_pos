<div class='modal fade' id='modalRegistrarPlan' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable ' role='document'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				<h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-3">
						<label name='nombrePiso'>Nombre</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='nomPlan' id='nomPlan' class='form-control' required>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3">
						<label name='nombrePiso'>Número de usuarios</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='numUsuarios' id='numUsuarios' class='form-control' required>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3">
						<label name='nombrePiso'>Número de cajas</label>
					</div>
					<div class="col-lg-9">
						<input type='text' name='numCajas' id='numCajas' class='form-control' required>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3">
						<label name='nombrePiso'>Valor</label>
					</div>
					<div class="col-lg-9">
						<input type='number' name='valorPlan' id='txtValorPlan' class='form-control' required>
					</div>
				</div>
			</div>
			<div>
				<label id='lblMsj'></label>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
				<button type='submit' id='btnGuardarPlan' class='btn btn-primary'>Guardar</button>
			</div>
		</div>
	</div>
</div>