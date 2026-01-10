<div class='modal fade' id='modalEditar' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
            <div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				<h5 class='modal-title' id='exampleModalLongTitle'>Editar temporada <strong id='idTemporada' style="display: none">ID</strong></h5>
            </div>
            <div class='modal-body'>
				<table width=100%>
					<tr>
						<td>
							<label name='nombrePiso'>Nombre</label>
						</td>
						<td>
							<input type='text' name='nomProd' id='nomCajaEditar' class='form-control' required>
							<strong id='errNomPisoEditar' style='color:red'></strong>
						</td>
					</tr>
				</table>
            </tr>
		</div>
		<div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
            <button type='submit' id='btnModificar' class='btn btn-primary'>Modificar</button>
		</div>
	</div>
</div>
</div>